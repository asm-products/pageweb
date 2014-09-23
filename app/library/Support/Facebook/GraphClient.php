<?php

namespace PageWeb\Support\Facebook;

use Cartalyst\Sentry\Sentry;
use Config;
use Facebook;
use Illuminate\Config\Repository;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class GraphClient implements GraphClientInterface
{
    const GRAPH_API_URL = 'https://graph.facebook.com';

    /**
     * @var \Cartalyst\Sentry\Users\UserInterface
     */
    protected $user;

    public function __construct(Facebook $client, Sentry $sentry, Repository $config)
    {
        $this->client = $client;
        $this->sentry = $sentry;
        $this->user = $sentry->getUser();
        $this->config = $config;
    }

    /**
     * {@inheritDoc}
     */
    public function getUser($id)
    {
        return $this->client->api(
            '/me?fields=id,name,first_name,last_name,location,bio,gender,email'
            . ',website,picture.height(240),username,updated_time,verified'
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getAllPages()
    {
        $url = sprintf('/%s/accounts', $this->user->getId());
        $this->call($url, $pages);

        return $pages;
    }

    /**
     * {@inheritDoc}
     */
    public function getPage($id, $token = null, array $options = [])
    {
        $token = $this->getToken($token);
        $fields = 'id,username,name,about,description,category,link'
            . ',access_token,location,phone,emails,picture.height(400)';
        $url = sprintf('/%s?fields=%s&access_token=%s', $id, $fields, $token);
        $this->call($url, $page);

        return [
            'id' => $page['id'],
            'name' => isset($page['username']) ? $page['username'] : str_random(10),
            'title' => $page['name'],
            'about' => isset($page['about']) ? $page['about'] : null,
            'phone' => isset($page['phone']) ? $page['phone'] : null,
            'email' => isset($page['emails'][0]) ? $page['emails'][0] : null,
            'address' => isset($page['location']['street']) ? $page['location']['street'] : null,
            'description' => isset($page['description']) ? $page['description'] : null,
            'category' => $page['category'],
            'link' => $page['link'],
            'photo' => isset($page['picture']['data']['url']) ? $page['picture']['data']['url'] : null,
            'access_token' => isset($page['access_token']) ? $page['access_token'] : null
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getPageAccessToken($id)
    {
        $url = sprintf('/%s?fields=access_token', $id);
        $this->call($url, $data);

        if (!isset($data['access_token'])) {
            return null;
        }

        return $data['access_token'];
    }

    /**
     * {@inheritDoc}
     */
    public function getPageAlbums($id, $token = null, array $options = [])
    {
        $token = $this->getToken($token);
        $query = [
            'albums' => ''
                . 'SELECT object_id, name, description, type, cover_object_id, photo_count, type'
                . ' FROM album'
                . ' WHERE owner=' . $id,
            'albums_cover_photo' => ''
                . 'SELECT object_id, album_object_id, src_big'
                . ' FROM photo'
                . ' WHERE object_id IN (SELECT cover_object_id FROM #albums)'
        ];

        if (isset($options['connection_photos'])) {
            $query['albums_photos'] = '' .
                'SELECT object_id, album_object_id, caption, created, src_big'
                . ' FROM photo'
                . ' WHERE album_object_id IN (SELECT object_id FROM #albums)';
        }

        $response = $this->client->api([
            'method' => 'fql.multiquery',
            'queries' => json_encode($query),
            'access_token' => $token,
            'callback' => ''
        ]);

        $albums = [];
        foreach ($response[0]['fql_result_set'] as $key => $album) {
            $albums[$key] = [
                'id' => $album['object_id'],
                'title' => $album['name'],
                'type' => $album['type'],
                'description' => $album['description'],
                'cover_photo' => isset($response[1]['fql_result_set'][$key]['src_big'])
                        ? $response[1]['fql_result_set'][$key]['src_big']
                        : null,
            ];

            if (isset($options['connection_photos'])) {
                // Haven't found a need for this yet...
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
        $url = '/' . $id . '/photos/uploaded?fields='
            . 'id,name,picture,source,album.fields(id,name,type),height,width,created_time'
            . '&access_token=' . $this->getToken($token);

        $this->call($url, $datas);
        $photos = [];
        foreach ($datas as $key => $data) {
            $photos[$key] = [
                'album_id' => $data['album']['id'],
                'id' => $data['id'],
                'caption' => isset($data['name']) ? $data['name'] : null,
                'height' => $data['height'],
                'type' => $data['album']['type'],
                'picture' => $data['picture'],
                'source' => $data['source'],
                'created_at' => $data['created_time']
            ];
        }

        return $photos;
    }

    /**
     * {@inheritDoc}
     */
    public function getPageCoverPhotos($id, $token = null, array $options = [])
    {
        $response = $this->client->api([
            'method' => 'fql.query',
            'query' => '
                    SELECT pid, owner, caption, src_big
                    FROM photo
                    WHERE aid IN (
                        SELECT aid,description, name, type, size
                        FROM album
                        WHERE owner = "' . e($id) . '" AND type = "cover"
                    );
                ',
            'access_token' => $token,
            'callback' => ''
        ]);

        $photos = [];
        foreach ($response as $key => $photo) {
            $photos[$key] = [
                'id' => $photo['pid'],
                'page_id' => $photo['owner'],
                'caption' => $photo['caption'],
                'picture' => $photo['src_big']
            ];
        }

        return $photos;
    }

    /**
     * {@inheritDoc}
     */
    public function getPagePosts($id, $token = null, array $options = [])
    {
        $url = '/' . $id . '/posts';
        if ($token != null) {
            $url .= '?access_token=' . $token;
        }

        $this->call($url, $datas);
        $posts = [];
        foreach ($datas as $key => $data) {
            $posts[$key] = [
                'id' => $data['id'],
                'type' => $data['type'],
                'content' => isset($data['message']) ? $data['message'] : null,
                'photo_url' => isset($data['picture']) ? $data['picture'] : null,
                'link' => isset($data['link']) ? $data['link'] : null,
                'link_caption' => isset($data['caption']) ? $data['caption'] : null,
                'link_title' => isset($data['name']) ? $data['name'] : null,
                'link_description' => isset($data['description']) ? $data['description'] : null,
                'created_at' => $data['created_time']
            ];
        }

        return $posts;
    }

    /**
     * {@inheritDoc}
     */
    public function getPageNotes($id, $token = null, array $options = [])
    {
        $url = '/' . $id . '/notes?fields=subject,id,message,created_time,updated_time&access_token='
            . $this->getToken($token);

        $this->call($url, $datas);
        $notes = [];
        foreach ($datas as $key => $data) {
            $notes[$key] = [
                'id' => $data['id'],
                'title' => $data['subject'],
                'content' => $data['message'],
                'created_at' => $data['created_time'],
                'updated_at' => $data['updated_time']
            ];
        }

        return $notes;
    }

    /**
     * {@inheritDoc}
     */
    public function getPageEvents($id, $token = null, array $options = [])
    {
        $url = '/' . $id . '/events?fields=name,start_time,end_time,timezone,updated_time,id,description,location,cover';
        if ($token != null) {
            $url .= '&access_token=' . $token;
        }

        $this->call($url, $datas);
        $events = [];
        foreach ($datas as $key => $data) {
            $events[$key] = [
                'id' => $data['id'],
                'title' => $data['name'],
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'timezone' => $data['timezone'],
                'updated_time' => $data['updated_data'],
                'location' => $data['location'],
                'description' => isset($data['description']) ? $data['description'] : null,
                'photo' => isset($data['cover']['source']) ? $data['cover']['source'] : null,
            ];
        }

        return $events;
    }

    /**
     * {@inheritDoc}
     */
    public function getClientAccessToken()
    {
        $url = sprintf(
            '/oauth/access_token?client_id=%s&client_secret=%s&grant_type=client_credentials',
            Config::get('facebook.app_id'),
            Config::get('facebook.app_secret')
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function call($url, &$data = [])
    {
        $response = null;
        try {
            $response = $this->client->api($url);
            if (!isset($response['data'])) {
                $response['data'] = $response;
            }
            $data = $response['data'];
        } catch (\FacebookApiException $e) {
            // var_dump($e->getCode(), $e->getType(), $e->getMessage(), $e->getResult());
        }

        return $response;
    }

    protected function getToken($token)
    {
        return $token ? $token : $this->config->get('facebook.app_access_token');
    }
}
