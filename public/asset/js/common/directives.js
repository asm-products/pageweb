angular.module('pgDirectives', [])
    .directive('pgBtnProgress', function () {
        return {
            restrict: 'A',
            scope: {
                form: '@pgBtnForm',
                action: '&pgBtnAction'
            },
            link: function (scope, elem, attrs, ctrls) {
                elem.bind('click', function (e) {
                    scope.$apply(function () {
                        elem.button('loading') && scope.action().then(function () {
                            elem.button('reset');
                        });
                    });
                });
            }
        }
    });