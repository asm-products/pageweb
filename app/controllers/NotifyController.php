<?php

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class NotifyController extends Controller
{
    public function facebook()
    {
        $verify_token = 'xx123xx';

        if (Request::isMethod('get')) {
            if ((($mode = Request::get('hub_mode')) && ($mode == 'subscribe'))
                && (($verifyToken = Request::get('hub_verify_token')) && ($verifyToken == $verify_token))
            ) {
                echo Request::get('hub_challenge');
                exit;
            }
        } elseif (Request::isMethod('post')) {
            Log::info(json_encode(Input::all()));
        }
    }
}
