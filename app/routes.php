<?php

/**
 * #home
 */
Route::group(['domain' => detect_domain($env)], function () {
    /**
     * Routes made available when visiting main site.
     */
    require app_path('/routes/preview.php');

    require app_path('/routes/manage.php');

    require app_path('/routes/admin.php');

    require app_path('/routes/xhr.php');

    require app_path('/routes/webhooks.php');

    require app_path('/routes/main.php');
});

Route::group(['before' => 'site.domain'], function () {
    /**
     * Available routes when accessing a site
     */
    require app_path('routes/site.php');
});
