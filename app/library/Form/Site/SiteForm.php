<?php

namespace PageWeb\Form\Site;

use Carbon\Carbon;
use Illuminate\Events\Dispatcher;
use PageWeb\Event\SiteActions;
use PageWeb\Repository\SiteAlbumRepository;
use PageWeb\Repository\SiteEventRepository;
use PageWeb\Repository\SiteFeedRepository;
use PageWeb\Repository\SitePhotoRepository;
use PageWeb\Repository\SitePostRepository;
use PageWeb\Repository\SiteRepository;
use PageWeb\Repository\ThemeRepository;
use PageWeb\Support\Exception\ValidationException;
use PageWeb\Support\Facebook\GraphClientInterface;
use Prologue\Alerts\AlertsMessageBag;
use RuntimeException;
use User;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteForm
{
    public function __construct(
        GraphClientInterface $graphClient,
        SiteRepository $siteRepo,
        ThemeRepository $themeRepo,
        SiteAlbumRepository $albumRepo,
        SitePhotoRepository $photoRepo,
        SitePostRepository $postRepo,
        SiteFeedRepository $feedRepo,
        SiteEventRepository $eventRepo,
        SiteFormValidator $validator,
        Dispatcher $dispatcher,
        AlertsMessageBag $alerts
    ) {
        $this->graphClient = $graphClient;
        $this->siteRepo = $siteRepo;
        $this->themeRepo = $themeRepo;
        $this->albumRepo = $albumRepo;
        $this->photoRepo = $photoRepo;
        $this->postRepo = $postRepo;
        $this->feedRepo = $feedRepo;
        $this->eventRepo = $eventRepo;
        $this->validator = $validator;
        $this->dispatcher = $dispatcher;
        $this->alerts = $alerts;
    }

    /**
     * Creates a page and attach a user
     *
     * @param int $pageId
     * @param \User $user
     * @return null|\PageWeb\Model\Site
     */
    public function create($pageId, User $user)
    {
        try {

            $token = $this->graphClient->getPageAccessToken($pageId);
            $page = $this->graphClient->getPage($pageId, $token);

            if (!$page) {
                throw new RuntimeException(trans('page.create_site_facebook_page_not_found'));
            }

            \DB::beginTransaction();

            $feeds = $this->graphClient->getPagePosts($pageId, $token);
            $notes = $this->graphClient->getPageNotes($pageId, $token);
            $albums = $this->graphClient->getPageAlbums($pageId, $token);
            $photos = $this->graphClient->getPagePhotos($pageId, $token);
            $events = $this->graphClient->getPageEvents($pageId, $token);

            $site = $this->siteRepo->create([
                'id' => $page['id'],
                'name' => $page['name'],
                'subdomain' => $page['name'],
                'title' => $page['title'],
                'token' => $page['access_token'],
                'email' => $page['email'],
                'phone' => $page['phone'],
                'address' => $page['address'],
                'photo' => $page['photo'],
                'about' => $page['about'],
                'description' => $page['description']
            ]);

            // Add page albums
            foreach ($albums as $album) {
                $this->albumRepo->create([
                    'id' => $album['id'],
                    'title' => $album['title'],
                    'site_id' => $site->getId(),
                    'cover_photo' => $album['cover_photo'],
                    'type' => $album['type'],
                ]);
            }

            // Add page photos
            foreach ($photos as $photo) {
                $this->photoRepo->create([
                    'id' => $photo['id'],
                    'caption' => $photo['caption'],
                    'album_id' => $photo['album_id'],
                    'site_id' => $site->getId(),
                    'url' => $photo['picture'],
                    'type' => $photo['type'],
                    'created_at' => Carbon::parse($photo['created_at'])
                ]);
            }

            // Add page posts
            foreach ($notes as $post) {
                $this->postRepo->create([
                    'id' => $post['id'],
                    'site_id' => $site->getId(),
                    'title' => $post['title'],
                    'content' => $post['content'],
                    'created_at' => Carbon::parse($post['created_at']),
                    'updated_at' => Carbon::parse($post['updated_at'])
                ]);
            }

            // Add page feeds
            foreach ($feeds as $feed) {
                $this->feedRepo->create([
                    'id' => $feed['id'],
                    'site_id' => $site->getId(),
                    'content' => $feed['content'],
                    'type' => $feed['type'],
                    'photo_url' => $feed['photo_url'],
                    'link' => $feed['link'],
                    'link_title' => $feed['link_title'],
                    'link_caption' => $feed['link_caption'],
                    'link_description' => $feed['link_description'],
                    'created_at' => Carbon::parse($feed['created_at'])
                ]);
            }

            // Add page events
            foreach ($events as $event) {
                $this->eventRepo->create([
                    'id' => $event['id'],
                    'site_id' => $site->getId(),
                    'title' => $event['title'],
                    'start_time' => Carbon::parse($event['start_time']),
                    'end_time' => Carbon::parse($event['end_time']),
                    'description' => $event['description'],
                    'photo' => $event['photo']
                ]);
            }

            /** @var $user \User */
            $this->siteRepo->assignManager($site, $user);

            // Assign default theme to site
            $site->setTheme($this->themeRepo->findByName('default'));

            \DB::commit();

            $this->dispatcher->fire(SiteActions::CREATE, [$site]);

            return $site;
        } catch (RuntimeException $e) {
            \DB::rollBack();
            $this->alerts->error($e->getMessage());
        }

        return false;
    }

    /**
     * @param array $data
     */
    public function update(array $data)
    {

    }

    /**
     * @param array $data
     * @return mixed|null
     */
    public function updateDomain(array $data)
    {
        $result = null;
        try {
            if (!$this->validator->usingDomainRules()->with($data)->passes()) {
                throw new ValidationException($this->validator->errors());
            }

            // Get user if user exists.
            $site = $this->siteRepo->findById($data['site_id']);
            $result = $this->siteRepo->setDomain($site, $data['domain']);

        } catch (ValidationException $e) {
            $this->alerts->merge($e->errors());
        }

        return $result;
    }

    public function errors()
    {
        return $this->alerts->get('error');
    }
}
