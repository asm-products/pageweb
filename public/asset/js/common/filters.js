angular.module('pgFilters', [])
    .filter('pgDateTime', [
        '$filter', function($filter) {
            return function(date_time_expr, format) {
                return $filter('date')(new Date(date_time_expr.replace('/-/g', '/')), format);
            };
        }
    ])
    .filter('pgStripTags', function() {
        return function(text) {
            return String(text).replace(/<[^>]+>/gm, '');
        };
    })
    .filter('pgTruncateWord', function() {
        return function(text, numWords) {
            var truncated = text.indexOf(' ', numWords);
            if (truncated == -1) {
                return truncated;
            }

            return text.substring(0, truncated)
        };
    });