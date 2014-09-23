<?php

namespace App\Controller\Ajax;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class AjaxController extends \Controller
{
    protected function response($response)
    {
        $defaults = ['errors' => true, 'error_message' => null, 'redirect' => false, 'redirect_url' => null];

        return \Response::json(array_merge($defaults, $response));
    }
}
