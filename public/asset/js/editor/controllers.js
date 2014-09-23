EditorApp.controller('MainCtrl', [
    '$scope', function($scope) {
        $scope.editor = PageWeb.editor;
        $scope.domainType = $scope.editor.site.domain == null ? 'sub' : 'custom';

        // Holds the current window or window to open
        $scope.panel = {window: null, opened: true};
        $scope.panel.previous = $scope.panel;

        // Holds the current opened extended panel window
        $scope.extendedPanel = {};

        $scope.reloadPreview = function() {
            document.getElementById('editor-preview-frame')
                .contentWindow
                .location
                .reload(true);
        };

        $scope.togglePanel = function(window) {
            // We are to open a new window
            if (window) {
                // If a panel window name is passed to this function, we
                // toggle open & close only this panel name
                if ($scope.panel.window == window && $scope.panel.opened) {
                    // If the name is the same as current panel, close this panel
                    $scope.panel = {window: null, opened: false};

                } else {
                    // Its a new window, open it..
                    $scope.panel = {window: window, opened: true};
                }
            } else {
                // No window name passed, toggle open & close
                if ($scope.panel.opened) {
                    $scope.panel = {window: null, opened: false};
                } else {
                    $scope.panel = $scope.panel.previous;
                    $scope.panel.opened = true;
                }
            }

            // Close the extended panel
            $scope.extendedPanel = {};
        };

        $scope.toggleExtendedPanel = function(parent, name) {
            var windowName = parent + '-' + name;
            $scope.extendedPanel.previous = $scope.extendedPanel;
            $scope.extendedPanel = {
                previous: $scope.extendedPanel,
                parent: parent,
                name: name,
                window: $scope.extendedPanel.previous.window == windowName
                    ? null
                    : windowName
            };
        };
    }
]);

EditorApp.controller('HeaderCtrl', [
    '$scope', 'UserResource', function($scope, UserResource) {
        $scope.sites = UserResource.sites();
    }
]);

EditorApp.controller('ToolboxCtrl', [
    '$scope', function($scope) {
    }
]);

/**
 * Panel Controller wraps around the panel content
 */
EditorApp.controller('PanelCtrl', [
    '$scope', function($scope) {
    }
]);

EditorApp.controller('ExtendedPanelCtrl', [
    '$scope', function($scope) {
    }
]);

/**
 * Site preview controller.
 * - Listens for a 'preview.reload' event to reload site preview
 */
EditorApp.controller('PreviewCtrl', [
    '$scope', function($scope) {
    }
]);

/**
 * Theme Window
 */
EditorApp.controller('ThemeWindowCtrl', [
    '$scope', 'ThemesResource', 'PageResource', '$location',
    function($scope, ThemesResource, PageResource, $location) {
        $scope.themes = ThemesResource.query();
        $scope.categories = ThemesResource.categories.query();
        $scope.themeId = $scope.editor.site.theme_id;

        $scope.themes.$promise.then(function() {
            angular.forEach($scope.themes, function(value, key) {
                $scope.themes[key]['url'] = http_replace_query($location.absUrl(), {theme: value.name});
            });
        });

        $scope.chooseTheme = function(theme) {
            return PageResource.update({id: $scope.editor.site.id}, {theme_id: theme.id})
                .$promise.then(function() {
                    $scope.editor.site.theme_id = $scope.themeId = theme.id;
                    $scope.reloadPreview()
                });
        }
    }
]);

EditorApp.controller('SettingWindowCtrl', [
    '$scope', '$http', 'PageResource', function($scope, $http, PageResource) {
        $scope.subdomain = $scope.editor.site.subdomain;
        $scope.domain = $scope.editor.site.domain;

        $scope.info = {
            email: $scope.editor.site.email,
            phone: $scope.editor.site.phone,
            address: $scope.editor.site.address
        };

        $scope.setSubDomain = function() {
            return PageResource.updateSubdomain({id: $scope.editor.site.id}, {subdomain: $scope.subdomain})
                .$promise.then(function() {
                    $scope.editor.site.subdomain = $scope.subdomain;
                });
        };

        $scope.setDomain = function() {
            return PageResource.updateDomain({id: $scope.editor.site.id}, {domain: $scope.domain})
                .$promise.then(function() {
                    $scope.editor.site.domain = $scope.domain;
                });
        };

        $scope.updateContact = function() {
            return PageResource.update({id: $scope.editor.site.id}, $scope.info)
                .$promise.then(function() {
                    angular.extend($scope.editor.site, $scope.info);
                });
        };

        $scope.publish = function() {
            return PageResource.update({id: $scope.editor.site.id}, {is_published: true})
                .$promise.then(function() {
                    $scope.editor.site.is_published = 1;
                });
        }
    }
]);

EditorApp.controller('ContentPostsCtrl', [
    '$scope', 'PageResource', function($scope, PageResource) {
        $scope.posts = PageResource.posts();
    }
]);

EditorApp.controller('ContentFeedsCtrl', [
    '$scope', 'PageResource', function($scope, PageResource) {
        $scope.feeds = PageResource.feeds();
    }
]);

EditorApp.controller('ContentAlbumsCtrl', [
    '$scope', 'PageResource', function($scope, PageResource) {
        $scope.albums = PageResource.albums();
    }
]);

EditorApp.controller('ContentPhotosCtrl', [
    '$scope', 'PageResource', function($scope, PageResource) {
        $scope.photos = PageResource.photos();
    }
]);

EditorApp.controller('ContentEventsCtrl', [
    '$scope', 'PageResource', function($scope, PageResource) {
        $scope.events = PageResource.events();
    }
]);