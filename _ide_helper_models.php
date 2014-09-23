<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace {

    exit;

/**
 * Admin
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $permissions
 * @property boolean $activated
 * @property string $activation_code
 * @property \Carbon\Carbon $activated_at
 * @property \Carbon\Carbon $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property \Carbon\Carbon $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentry\Groups\Eloquent\Group[] $groups
 * @method static \Illuminate\Database\Query\Builder|\Admin whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereFirstName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereLastName($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin wherePermissions($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereActivated($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereActivationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereActivatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereLastLogin($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin wherePersistCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereResetPasswordCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\Admin whereDeletedAt($value) 
 */
	class Admin {}
}

namespace {
/**
 * User
 *
 * @property-read string $username
 * @property-read string $first_name
 * @property-read string $last_name
 * @property-read string $email
 * @property-read string $password
 * @property-read Site   $sites
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $id
 * @property string $token
 * @property string $photo
 * @property string $permissions
 * @property boolean $activated
 * @property string $activation_code
 * @property \Carbon\Carbon $activated_at
 * @property \Carbon\Carbon $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\static::$groupModel[] $groups
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereFirstName($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereLastName($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePhoto($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePermissions($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereActivated($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereActivationCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereActivatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereLastLogin($value) 
 * @method static \Illuminate\Database\Query\Builder|\User wherePersistCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereResetPasswordCode($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value) 
 */
	class User {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\Site
 *
 * @property-read Collection $users
 * @property-read Collection $albums
 * @property-read Collection $photos
 * @property-read Collection $posts
 * @property-read Collection $feeds
 * @property-read Collection $events
 * @property-read Collection $options
 * @property-read Theme      $theme
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $id
 * @property string $name
 * @property string $subdomain
 * @property string $title
 * @property string $email
 * @property string $photo
 * @property string $phone
 * @property string $address
 * @property string $about
 * @property string $description
 * @property boolean $is_published
 * @property string $token
 * @property integer $theme_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \PageWeb\Model\Subscription $subscription
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereSubdomain($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereEmail($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site wherePhoto($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site wherePhone($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereAddress($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereAbout($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereIsPublished($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereToken($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereThemeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Site whereUpdatedAt($value) 
 */
	class Site {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SiteAlbum
 *
 * @property-read Collection $photos
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $id
 * @property integer $site_id
 * @property string $title
 * @property string $cover_photo
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereCoverPhoto($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereType($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteAlbum whereUpdatedAt($value) 
 */
	class SiteAlbum {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SiteDomain
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $site_id
 * @property string $domain
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteDomain whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteDomain whereDomain($value) 
 */
	class SiteDomain {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SiteEvent
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $id
 * @property integer $site_id
 * @property string $title
 * @property string $start_time
 * @property string $end_time
 * @property string $description
 * @property string $photo
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent whereStartTime($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent whereEndTime($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteEvent wherePhoto($value) 
 */
	class SiteEvent {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SiteFeed
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property string $id
 * @property integer $site_id
 * @property string $content
 * @property string $type
 * @property string $photo_url
 * @property string $link
 * @property string $link_title
 * @property string $link_caption
 * @property string $link_description
 * @property \Carbon\Carbon $created_at
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereType($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed wherePhotoUrl($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereLink($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereLinkTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereLinkCaption($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereLinkDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteFeed whereCreatedAt($value) 
 */
	class SiteFeed {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SiteOption
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $site_id
 * @property string $option
 * @property string $value
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteOption whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteOption whereOption($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SiteOption whereValue($value) 
 */
	class SiteOption {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SitePhoto
 *
 * @property-read Collection $album
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property integer $id
 * @property integer $album_id
 * @property integer $site_id
 * @property string $type
 * @property string $caption
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereAlbumId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereType($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereCaption($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereUrl($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePhoto whereCreatedAt($value) 
 */
	class SitePhoto {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SitePost
 *
 * @author Laju Morrison <morrelinko@gmail.com>
 * @property string $id
 * @property integer $site_id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \PageWeb\Model\Site $site
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePost whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePost whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePost whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePost whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePost whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SitePost whereUpdatedAt($value) 
 */
	class SitePost {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\Subscription
 *
 * @author - Tiamiyu waliu
 * @property integer $id
 * @property integer $site_id
 * @property integer $subscription_plan_id
 * @property boolean $stripe_active
 * @property string $stripe_id
 * @property string $stripe_plan
 * @property string $last_four
 * @property \Carbon\Carbon $trial_ends_at
 * @property \Carbon\Carbon $subscription_ends_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \PageWeb\Model\SubscriptionPlan $plan
 * @property-read \PageWeb\Model\Page $page
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereSiteId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereSubscriptionPlanId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereStripeActive($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereStripeId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereStripePlan($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereLastFour($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereTrialEndsAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereSubscriptionEndsAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Subscription whereUpdatedAt($value) 
 */
	class Subscription {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\SubscriptionPlan
 *
 * @author - Tiamiyu waliu
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $amount
 * @property string $settings
 * @property \Carbon\Carbon $created_at
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereAmount($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereSettings($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\SubscriptionPlan whereCreatedAt($value) 
 */
	class SubscriptionPlan {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\Theme
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $title
 * @property-read \Illuminate\Database\Eloquent\Collection|\PageWeb\Model\Site[] $sites
 * @property-read mixed $preview
 * @property-read \PageWeb\Model\ThemeCategory $category
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereDescription($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereCategoryId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereUpdatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\Theme whereTitle($value) 
 */
	class Theme {}
}

namespace PageWeb\Model{
/**
 * PageWeb\Model\ThemeCategory
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\PageWeb\Model\Theme[] $themes
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\ThemeCategory whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\ThemeCategory whereName($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\ThemeCategory whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\PageWeb\Model\ThemeCategory whereUpdatedAt($value) 
 */
	class ThemeCategory {}
}

