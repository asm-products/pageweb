EditorApp.filter('themesInCategory', function() {
    return function(input, categoryId) {
        var themes = categoryId ? [] : input;
        if (categoryId) {
            angular.forEach(input, function(value, key) {
                if (categoryId == value.category_id) {
                    themes.push(value);
                }
            }, themes);
        }

        return themes;
    }
});