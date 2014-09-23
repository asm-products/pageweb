<?php

namespace PageWeb\Repository;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Collection;
use PageWeb\Event\SiteActions;
use PageWeb\Model\Site;
use PageWeb\Support\Exception\ValidationException;
use User;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteRepository
{
    protected $model;

    public function __construct(Site $site, Dispatcher $dispatcher)
    {
        $this->model = $site;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Gets all websites
     *
     * @param array $columns
     * @return Collection
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * @param int $limit
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginate($limit = 0)
    {
        return $this->model->newInstance()->paginate($limit);
    }

    /**
     * @param $id
     * @return Site
     */
    public function findById($id)
    {
        $site = $this->model->find($id);

        return $site;
    }

    /**
     *Get list of sites created by credentials
     *
     * @param array $fields
     * @param int $limit
     * @return array
     */
    public function findBy(array $fields, $limit = 0)
    {
        $model = $this->model->newInstance()->newQuery();

        foreach ($fields as $field => $value) {
            $model->where($field, $value);
        }

        if ($limit) {
            return $model->paginate($limit);
        }

        return $model->get();
    }

    /**
     * @param string $name
     * @return Site|null
     */
    public function findByName($name)
    {
        return $this->model->newQuery()->where('name', $name)->first();
    }

    /**
     * @param string $subdomain
     * @return Site|null
     */
    public function findBySubdomain($subdomain)
    {
        return $this->model->newQuery()->where('subdomain', $subdomain)->first();
    }

    /**
     * @param bool $published Set to true to get published sites, and false to get unpublished sites
     * @param int $limit
     * @return array
     */
    public function findByPublished($published = true, $limit = 0)
    {
        return $this->findBy(['is_published' => $published ? '1' : '0'], $limit);
    }

    /**
     * @param array $data
     * @return Site
     */
    public function create(array $data)
    {
        $site = $this->model->newInstance();
        $site->fill($data);
        $site->save();

        return $site;
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        if ($site = $this->model->find($id)) {
            if ($site->update($data)) {
                return $site;
            }
        }

        return false;
    }

    /**
     * Assigns a new site manager
     *
     * @param Site $site
     * @param User $user
     * @return \PageWeb\Model\Site
     */
    public function assignManager(Site $site, User $user)
    {
        if ($user->canManageSite($site->getId())) {
            // If the user can manage site, just return the site model
            return $site;
        }

        $site->users()->attach($user->getId());

        return $site;
    }

    public function publish($site)
    {
        if (!$site = $this->createSite($site)) {
            return false;
        }

        $site->publish(true);

        $this->dispatcher->fire(SiteActions::PUBLISH, [$site]);

        return true;
    }

    /**
     * @param Site|string $site
     * @param $subdomain
     * @return mixed
     * @throws \PageWeb\Support\Exception\ValidationException
     */
    public function setSubDomain($site, $subdomain)
    {
        if (!$site = $this->createSite($site)) {
            return false;
        }

        /** @var $wordBlackList \PageWeb\Toolbox\WordBlacklist */
        $wordBlackList = \App::make('PageWeb\Toolbox\WordBlacklist');
        if (!$wordBlackList->check($subdomain)) {
            throw new ValidationException(trans('site.invalid_subdomain', ['value' => $subdomain]));
        }

        return $this->update($site->getId(), ['subdomain' => $subdomain]);
    }

    /**
     * @param Site $site
     * @param $domain
     * @return mixed
     */
    public function setDomain(Site $site, $domain)
    {
        $site->domain()->where('site_id', $site->getId())->delete();

        return $site->domain()->insert(['site_id' => $site->getId(), 'domain' => $domain]);
    }

    /**
     * Sets theme option for a page
     * <code>
     *  $siteRepo->setOption(53234243, 'some_option', 'some_value');
     * </code>
     * It also allows you to pass an array of option var -> value
     * <code>
     *  $siteRepo->setOption(323423423, [
     *      'some_option' => 'some value',
     *      'another_option' => 'another value'
     *  ]);
     * </code>
     *
     * @param int $siteId Page ID
     * @param string|array $options Var name of the option or an array of options
     * @param null|mixed $value If the var name is a string, this is used to set the value
     * @return bool
     */
    public function setOption($siteId, $options, $value = null)
    {
        if (!$site = $this->findById($siteId)) {
            return false;
        }

        if (!is_array($options)) {
            $options = array($options => $value);
        }

        // Get a list of all existing options for the site
        $existing = array_flip($site->options->lists('option'));

        foreach ($options as $option => $value) {
            if (isset($existing[$option])) {
                // Already been saved to database, update it
                $site->options()
                    ->where('option', $option)
                    ->update(['value' => $value]);
            } else {
                // Not in database, insert it.
                $site->options()->create([
                    'option' => $option,
                    'value' => $value
                ]);
            }
        }

        return true;
    }

    public function getTotalSites()
    {
        return $this->model->newInstance()->count();
    }

    /**
     * Gets total number of pages that has been published
     *
     * @return int
     */
    public function getTotalPublished()
    {
        return $this->findByPublished(true)->count();
    }

    /**
     * Gets the total number of pages that has not been published
     *
     * @return int
     */
    public function getTotalUnpublished()
    {
        return $this->findByPublished(false)->count();
    }

    /**
     * @param $site
     * @return bool|Site
     */
    private function createSite($site)
    {
        if (!$site instanceof Site && !($site = $this->findById($site))) {
            return false;
        }

        return $site;
    }
}
