<?php

namespace PageWeb\Filter;

use App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use PageWeb\Repository\SiteDomainRepository;
use PageWeb\Repository\SiteRepository;

/**
 * @author Laju Morrison <morrelinko@gmail.com>
 */
class SiteDomainFilter
{
    public function __construct(SiteDomainRepository $siteDomainRepo, SiteRepository $siteRepo)
    {
        $this->siteDomainRepo = $siteDomainRepo;
        $this->siteRepo = $siteRepo;
    }

    public function filter(Route $route, Request $request)
    {
        $domain = detect_domain(App::environment());
        if (preg_match('#' . $domain . '#', $request->getHost())) {
            // Site accessed via sub-domain
            $subdomain = strtok($request->getHost(), '.');
            $site = $this->siteRepo->findBySubdomain($subdomain);

            if ($site->domain) {
                // If the site has a domain, Lets do a 302 redirect
                // to the user custom domain
                return new RedirectResponse('http://' . $site->domain->domain, 302);
            }
        } else {
            // Site probably accessed from custom domain
            if ($domain = $this->siteDomainRepo->findByDomain($request->getHost())) {
                $site = $domain->site;
            }
        }

        if (empty($site)) {
            // We didn't find a site, there is probably no site with
            // a dot (.) subdomain, which will throw a 404 error
            $site = '.';
        }

        $parameters = $route->parameters();
        $route->setParameter('site', $site);

        foreach ($parameters as $key => $value) {
            $route->forgetParameter($key);
            $route->setParameter($key, $value);
        }
    }
}
