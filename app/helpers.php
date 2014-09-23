<?php

if (!function_exists('http_replace_query')) {
    function http_replace_query($url, array $replace = [])
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        $url = strtok($url, '?');

        return $url . ($query ? '?' . http_build_query(array_merge($query, $replace)) : '');
    }
}

if (!function_exists('array_first_not_null')) {
    function array_first_not_null($array)
    {
        return array_first($array, function ($item) {
            return $item != null;
        });
    }
}

if (!function_exists('detect_domain')) {
    function detect_domain($env)
    {
        switch ($env) {
            case 'local':
            case 'dev':
            case 'testing':
                return 'pageweb.app';
                break;
            case 'staging':
                return 'thefatteninggroom.com';
                break;
            case 'production':
                return 'pageweb.co';
                break;
        }

        return null;
    }
}

if (!function_exists('is_main_site')) {
    function is_main_site($host = null)
    {
        $domain = detect_domain(App::environment());

        if (!$host) {
            $host = $_SERVER['HTTP_HOST'];
        }

        if (preg_match('#' . $domain . '#', $host)) {
            return true;
        }

        return false;
    }
}

if (!function_exists('get_domain_host')) {
    function get_domain_host($domain)
    {
        return $domain;
    }
}
