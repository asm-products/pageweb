<?php

namespace PageWeb\Support\Facebook;

use Cartalyst\Sentry\Sentry;
use Morrelinko\Datran\Builder\CollectionBuilder;
use Morrelinko\Datran\Builder\ItemBuilder;
use Morrelinko\Datran\Transformer;
use Morrelinko\Datran\Type\ArrayType;
use Morrelinko\Datran\Type\JsonType;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class DummyGraphClient implements GraphClientInterface
{
    public $nameMap = [
        'netaviva' => '296786385875',
        'contactlyapp' => '206758826147180'
    ];

    public function __construct(Sentry $sentry)
    {
        $this->sentry = $sentry;
        $this->user = $sentry->getUser();
        $this->transformer = new Transformer(new JsonType(), new ArrayType());
    }

    public function getUser($id)
    {
        return $this->transformer->transform($this->getUserData($id, 'user.json'));
    }

    /**
     * {@inheritDoc}
     */
    public function getAllPages()
    {
        return $this->transformer->transform($this->getUserData($this->user->getId(), 'accounts.json'));
    }

    /**
     * {@inheritDoc}
     */
    public function getPageAccessToken($id)
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getPage($id, $token = null, array $options = [])
    {
        $builder = new ItemBuilder();
        $builder
            ->map('id')
            ->map('name', 'title')->remove('name')
            ->map('username', 'name')->remove('username')
            ->map('about')
            ->map('phone')
            ->map('emails.0', 'email')->remove('emails')
            ->map('picture.data.url', 'photo')->remove('picture')
            ->map('location.street', 'address')->remove('location')
            ->map('description')
            ->map('category')
            ->map('link')
            ->map('access_token');

        return $this->transformer->transform($this->getPageData($id, 'page.json'), $builder);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageAlbums($id, $token = null, array $options = [])
    {
        $albums = [];
        $data = $this->transformer->transform($this->getPageData($id, 'albums.json'));

        if (!isset($data[0])) {
            return $albums;
        }

        foreach ($data[0]['fql_result_set'] as $key => $album) {
            $albums[$key] = [
                'id' => $album['object_id'],
                'title' => $album['name'],
                'type' => $album['type'],
                'description' => $album['description'],
                'cover_photo' => isset($data[1]['fql_result_set'][$key]['src_big'])
                        ? $data[1]['fql_result_set'][$key]['src_big']
                        : null,
            ];

            if (isset($options['connection_photos'])) {
                $albums[$key]['photos'] = [];
            }
        }

        return $albums;
    }

    /**
     * {@inheritDoc}
     */
    public function getPagePhotos($id, $token = null, array $options = [])
    {
        $builder = new CollectionBuilder();
        $builder
            ->map('id')
            ->map('album.id', 'album_id')
            ->map('album.type', 'type')->remove('album')
            ->map('name', 'caption')->remove('name')
            ->map('height')
            ->map('picture')
            ->map('source')
            ->map('created_time', 'created_at')->remove('created_time');

        return $this->transformer->transform($this->getPageData($id, 'photos.json'), $builder);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageCoverPhotos($id, $token = null, array $options = [])
    {
        $builder = new CollectionBuilder();
        $builder
            ->map('pid', 'id')->remove('pid')
            ->map('owner', 'page_id')->remove('owner')
            ->map('caption')
            ->map('src_big', 'picture')->remove('src_big');

        return $this->transformer->transform($this->getPageData($id, 'cover-photos.json'), $builder);
    }

    /**
     * {@inheritDoc}
     */
    public function getPagePosts($id, $token = null, array $options = [])
    {
        $builder = new CollectionBuilder();
        $builder
            ->map('id')
            ->map('type')
            ->map('message', 'content')->remove('message')
            ->map('picture', 'photo_url')->remove('picture')
            ->map('link')
            ->map('caption', 'link_caption')->remove('caption')
            ->map('name', 'link_title')->remove('name')
            ->map('description', 'link_description')->remove('description')
            ->map('created_time', 'created_at')->remove('created_time');

        return $this->transformer->transform($this->getPageData($id, 'posts.json'), $builder);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageNotes($id, $token = null, array $options = [])
    {
        $builder = new CollectionBuilder();
        $builder
            ->map('id')
            ->map('subject', 'title')->remove('subject')
            ->map('message', 'content')->remove('message')
            ->map('created_time', 'created_at')->remove('created_time')
            ->map('updated_time', 'updated_at')->remove('updated_time');

        return $this->transformer->transform($this->getPageData($id, 'notes.json'), $builder);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageEvents($id, $token = null, array $options = [])
    {
        $builder = new CollectionBuilder();
        $builder
            ->map('id')
            ->map('name', 'title')->remove('name')
            ->map('start_time')
            ->map('end_time')
            ->map('timezone')
            ->map('updated_data', 'updated_time')->remove('updated_data')
            ->map('location')
            ->map('description')
            ->map('cover.source', 'photo')->remove('cover');

        return $this->transformer->transform($this->getPageData($id, 'events.json'), $builder);
    }

    /**
     * Gets sample page data from a file
     *
     * @param int $id Page ID
     * @param string $file JSON file containing data
     * @return mixed|null
     */
    protected function getPageData($id, $file)
    {
        if (is_string($id) && isset($this->nameMap[$id])) {
            $id = $this->nameMap[$id];
        }

        $path = storage_path('data/facebook-pages/' . $id . '/' . $file);

        if (!file_exists($path)) {
            return null;
        }

        return file_get_contents($path);
    }

    /**
     * Gets sample facebook user json from file
     *
     * @param int $id User ID
     * @param string $file JSON file containing data
     * @return mixed|null
     */
    protected function getUserData($id, $file)
    {
        $path = storage_path('data/facebook-users/' . $id . '/' . $file);

        if (!file_exists($path)) {
            return null;
        }

        return file_get_contents($path);
    }
}
