var interceptors = angular.module('pgInterceptors', [])
    .factory('urlInterceptor', [
        '$q', function($q) {
            return {
                'request': function(config) {
                    if (config.url.substr(0, 3) == 'xhr') {
                        config.url = PageWeb.baseUrl + '/' + config.url;
                    }

                    return config || $q.when(config);
                }
            }
        }
    ])
    .config([
        '$httpProvider', function($httpProvider) {
            $httpProvider.interceptors.push('urlInterceptor');
        }
    ]);