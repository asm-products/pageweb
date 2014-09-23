(function($, SiteEditor) {

    SiteEditor.lastOpenWindow = null;

    /**
     * Reload site preview
     */
    SiteEditor.reloadPreview = function() {
        document.getElementById('editor-preview-frame')
            .contentWindow
            .location
            .reload(true);
    };

    /**
     * Expand panel window
     */
    SiteEditor.showPanelWindow = function() {
        $('#editor-content').addClass('editor-panel-open')
    };

    /**
     * Checks if the panel window is opened
     *
     * @returns {*}
     */
    SiteEditor.isPanelWindowOpened = function() {
        return $('#editor-content').hasClass('editor-panel-open');
    };

    /**
     * Collapse panel window
     */
    SiteEditor.hidePanelWindow = function() {
        $('#editor-content').removeClass('editor-panel-open');
    };

    /**
     * Toggle panel window
     */
    SiteEditor.togglePanelWindow = function() {
        if (SiteEditor.isPanelWindowOpened()) {
            SiteEditor.hidePanelWindow()
        } else {
            SiteEditor.showPanelWindow();
        }
    };

    SiteEditor.loadIntoWindow = function(content_id) {
        if (!SiteEditor.isPanelWindowOpened()) {
            SiteEditor.showPanelWindow();
        }
        else if (SiteEditor.lastOpenWindow == content_id) {
            SiteEditor.togglePanelWindow();
        }

        SiteEditor.lastOpenWindow = content_id;

        var $content = $(content_id);
        if ($content.length > 0) {
            var content = $content.clone()
                .html()
                .trim();

            $('#editor-panel')
                .html(content);
        }
    };

    SiteEditor.expandWindow = function(expand) {
        if (expand) {
            $('.editor-window')
                .removeClass('container-fluid')
                .addClass('container')
                .find('.editor-window-main')
                .removeClass('col-lg-12')
                .addClass('col-lg-3')
                .end()
                .find('.editor-window-expanded')
                .show();
        } else {
            $('.editor-window')
                .removeClass('container')
                .addClass('container-fluid')
                .find('.editor-window-main')
                .removeClass('col-lg-3')
                .addClass('col-lg-12')
                .end()
                .find('.editor-window-expanded')
                .hide();
        }
    };

    $(function($) {
        // On page load, load theme content into the panel window
        SiteEditor.loadIntoWindow('#editor-item-setting');

        $(function() {
            var height = $('#editor-site-preview').height();
            $('iframe').css('height', height);
        });

        //And if the outer div has no set specific height set..
        $(window).resize(function() {
            var height = $('#editor-site-preview').innerHeight();
            $('iframe').css('height', height);
        });

        // Toggle panel window
        $('#editor-panel-toggle').on('click', function() {
            console.log('toggle panel window');
            SiteEditor.togglePanelWindow();

            return false;
        });

        // Load toolbox content into panel window
        $('.editor-toolbox-item').on('click', function() {
            console.log('loading into view: ' + $(this).attr('href'));
            SiteEditor.loadIntoWindow(
                $(this).attr('href')
            );

            return false;
        });

        // Choose theme
        $(document).on('click', '.editor-select-theme', function() {
            var theme = $(this).attr('id')
                .replace('theme-', '')
                .trim();

            if (SiteEditor.site.is_preview) {
                return true
            }

            $.ajax({
                type: 'POST',
                url: '/xhr/pages/' + SiteEditor.site.id + '/editor/theme',
                dataType: 'json',
                data: {
                    theme: theme
                },
                success: function() {
                    SiteEditor.reloadPreview();
                }
            });

            return false;
        });

        // Opens a section
        $(document).on('click', 'a.editor-content-item', function() {
            var $this = $(this), id = $this.attr('id'),
                url = '/xhr/pages/' + SiteEditor.site.id + '/editor/' + id.replace('editor-item-section-', '');

            //SiteEditor.expandWindow(true);
            $this.addClass('expanded');

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(html) {
                    $('#editor-item-section-window')
                        .find('.content')
                        .html(html);
                }
            });
        });

        // Change sub domain name
        $(document).on('submit', '#setting-change-subdomain-form', function() {
            $.ajax({
                type: 'POST',
                url: '/xhr/pages/' + SiteEditor.site.id + '/editor/subdomain',
                dataType: 'json',
                data: {name: $(this).find('[name="subdomain"]').val()},
                success: function(data) {
                    console.log(data);
                }
            });

            return false;
        });

        // Update site contact info
        $(document).on('submit', '#setting-update-contact-form', function() {
            $.ajax({
                type: 'POST',
                url: '/xhr/pages/' + SiteEditor.site.id + '/editor/info',
                dataType: 'json',
                data: $(this).serialize(),
                success: function(data) { console.log(data);}
            });

            return false;
        });

        // Publish site
        $(document).on('click', '#setting-publish', function() {
            var $this = $(this);
            $.ajax({
                type: 'POST',
                url: '/xhr/pages/' + SiteEditor.site.id + '/editor/publish',
                dataType: 'json',
                success: function() {
                    $this
                        .removeClass('btn-primary')
                        .addClass('btn-success disabled')
                        .text('Published');
                }
            });

            return false;
        });
    });

})(jQuery, SiteEditor);
