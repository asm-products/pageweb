<?php

namespace PageWeb\SocialAuth;

/**
 * My Workaround to opauth library
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class RequestParser
{
    protected $urlName;

    protected $action;

    public function __construct($path = '/')
    {
        $this->request = \Request::instance();
        $this->path = $path;
    }

    /**
     * Getter for provider's urlname
     *
     * @return string Request parameter for the provider urlname
     */
    public function urlname()
    {
        $this->parse();

        return $this->urlName;
    }

    /**
     * Getter for action argument, usually `callback`
     *
     * @return string Request parameter for action
     */
    public function action()
    {
        $this->parse();

        return $this->action;
    }

    /**
     * Returns base provider url
     *
     * @return string Url string to base path for the provider
     */
    public function providerUrl()
    {
        return $this->request->root() . $this->path . $this->urlName;
    }

    protected function parse()
    {
        if ($this->urlName != null) {
            return;
        }

        if (strpos($this->request->getPathInfo(), $this->path) === false) {
            throw new \Exception(sprintf('Not an Opauth request, path "%s" is not in uri', $this->path));
        }
        $request = substr($this->request->getPathInfo(), strlen($this->path) - 1);
        preg_match_all('/\/([A-Za-z0-9-_]+)/', $request, $matches);
        if (!empty($matches[1][0])) {
            $this->urlName = $matches[1][0];
        }
        if (!empty($matches[1][1])) {
            $this->action = $matches[1][1];
        }
    }
}
 