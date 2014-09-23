<?php

namespace PageWeb\Support\Facebook;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
interface GraphClientInterface
{
    /**
     * Gets user info
     *
     * @param $id
     * @return mixed
     */
    public function getUser($id);

    /**
     * Gets all pages the user is managing
     */
    public function getAllPages();

    /**
     * @param $id
     * @param null $token
     * @param array $options
     * @return mixed
     */
    public function getPage($id, $token = null, array $options = []);

    /**
     * @param int $id Page ID
     * @param string $token Access Token
     * @param array $options
     * @return
     */
    public function getPageAlbums($id, $token = null, array $options = []);

    /**
     * @param int $id Page ID
     * @param string $token Access Token
     * @param array $options
     * @return
     */
    public function getPagePhotos($id, $token = null, array $options = []);

    /**
     * @param int $id Page ID
     * @param null $token Access Token
     * @param array $options
     * @return mixed
     */
    public function getPageCoverPhotos($id, $token = null, array $options = []);

    /**
     * Get page posts (Feed)
     *
     * @param int $id Page ID
     * @param string $token Access Token
     * @param array $options
     * @return
     */
    public function getPagePosts($id, $token = null, array $options = []);

    /**
     * Gets page notes (blog)
     *
     * @param int $id Page ID
     * @param string $token Access Token
     * @param array $options
     * @return
     */
    public function getPageNotes($id, $token = null, array $options = []);

    /**
     * @param int $id Page ID
     * @param string $token Access Token
     * @param array $options
     * @return
     */
    public function getPageEvents($id, $token = null, array $options = []);

    /**
     * @param $id
     * @return null
     */
    public function getPageAccessToken($id);
}
