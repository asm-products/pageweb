<?php

/**
 * @property-read User $currentUser
 * @author
 */
class BaseController extends Controller
{
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function __get($property)
    {
        if ($property == 'currentUser') {
            return Sentry::getUser();
        }

        throw new RuntimeException('Call to undefined property: ' . $property);
    }
}
