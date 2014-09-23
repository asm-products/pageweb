<?php

namespace App\Controller\Ajax;

use Cartalyst\Sentry\Sentry;
use Illuminate\Routing\Controller;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class UserController extends Controller
{
    /**
     * @var \User
     */
    protected $user;

    public function __construct(Sentry $sentry)
    {
        $this->sentry = $sentry;
    }

    public function sites($userId)
    {
        $user = $this->getUser($userId);

        return \Response::json($user->sites);
    }

    /**
     * @param $userId
     * @return \User
     */
    protected function getUser($userId)
    {
        if ($userId == 'me') {
            return $this->sentry->getUser();
        }

        return $this->sentry->findUserById($userId);
    }
}
 