<?php

namespace PageWeb\Site;

use Cartalyst\Sentry\Sentry;
use Illuminate\Http\Request;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SourceManager
{
    protected $source = null;

    public function __construct(Request $request, Sentry $sentry)
    {
        $this->request = $request;
        $this->sentry = $sentry;
    }

    /**
     * Detects which source to use
     *
     * @return SourceManager
     */
    public function detect()
    {
        if ($this->request->get('source') == 'api' && !$this->sentry->check()) {
            // if there is a parameter 'source' in request set to api
            // and the user is not logged in, then the source is
            $this->source = 'pageweb.api-data-source';
        } else {
            $this->source = 'pageweb.database-data-source';
        }

        return $this;
    }

    /**
     * @return DataSourceInterface
     */
    public function source()
    {
        return app($this->source);
    }

    /**
     * Checks if user is in quick preview
     *
     * @return bool
     */
    public function isQuickPreview()
    {
        return !$this->sentry->check() && $this->request->get('preview');
    }
}
