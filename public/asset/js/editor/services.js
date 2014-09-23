EditorApp.factory('ThemesResource', [
    '$resource', '$http', function($resource, $http) {
        var actions = {
            'query': {
                method: 'GET',
                isArray: true,
                cache: true
            }
        };

        var Themes = $resource('xhr/themes/:themeId', {
            themeId: '@id'
        }, actions);

        Themes.categories = $resource('xhr/themes/categories/:categoryId', {
            categoryId: '@id'
        }, {query: {method: 'GET', isArray: true, cache: true}});

        Themes.forPage = function(pageId) {
            return Themes.query({page_id: pageId});
        };

        return Themes;
    }
]);

EditorApp.factory('PageResource', [
    '$resource', function($resource) {
        var actions = {
            get: {method: 'GET', cache: false},
            posts: {method: 'GET', isArray: true, params: {resource: 'posts'}, cache: true},
            feeds: {method: 'GET', isArray: true, params: {resource: 'feeds'}, cache: true},
            albums: {method: 'GET', isArray: true, params: {resource: 'albums'}, cache: true},
            photos: {method: 'GET', isArray: true, params: {resource: 'photos'}, cache: true},
            events: {method: 'GET', isArray: true, params: {resource: 'events'}, cache: true},
            updateSubdomain: {method: 'POST', params: {resource: 'subdomain'}},
            updateDomain: {method: 'POST', params: {resource: 'domain'}},
            update: {method: 'POST'}
        };

        return $resource('xhr/sites/:id/:resource/:resource_id', {
            id: PageWeb.editor.id,
            resource: '@id',
            resource_id: '@id'
        }, actions);
    }
]);

EditorApp.factory('UserResource', [
    '$resource', function($resource) {
        var actions = {
            sites: {method: 'GET', isArray: true, cache: true, params: {resource: 'sites'}}
        };

        var Users = $resource('xhr/users/me/:resource', {
            resource: '@id'
        }, actions);

        return Users;
    }
]);
