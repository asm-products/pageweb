<?php $site = Theme::get('site'); ?>
<!--Footer Starts -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copy">
                    <!-- This theme comes with Creative Commons Attribution 3.0 Unported license. So you should not remove the footer link. -->
                    Copyright 2014 &copy; <a href="http://pageweb.co">PageWeb</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Footer Ends -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 


@if ($site->inEditMode())
<link rel="stylesheet" href="{{ $site->urlTo('assets/css/styleselector.css') }}" />
<script type="text/javascript" src="{{ $site->urlTo('assets/js/styleselector.js') }}"></script>
<!-- Styles Selector -->
<div id="style-selector">
    <div class="style-selector-wrapper">
        <h2>Theme Options</h2>
        <div>
            <div class="layout">
                <h3>Background Image</h3>
                <input id="headerwrap-background-image-option" type="text" value="{{ $site->option('headerwrap_bg_image', $site->urlTo('assets/img/mainback.jpg'), false) }}" /><br/>
                <button id="update-option">Save</button>
                <script>
                    $('#update-option').on('click', function() {
                        $.ajax({
                            url: '/xhr/sites/' + <?php echo $site->getId() ?> +'/theme/options',
                            type: 'POST',
                            dateType: 'json',
                            data: {
                                'headerwrap_bg_image': $('#headerwrap-background-image-option').val()
                            },
                            success: function(data) {
                                // Just ignore this, i want to use my reloadPreview() function defined inside
                                // the EditorApp main controller... If its necessary, you can use this piece of
                                // code to reload the editor preview site....
                                var scope = parent.angular.element(parent.$('#editor-content')).scope();
                                scope.reloadPreview();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <a href="#" class="close icon-chevron-right"></a> </div>
@endif;

@if (!$site->inEditMode())
{{Theme::asset()->scripts();}}
@endif
@yield('scripts')
<script type="text/javascript" src="{{ $site->urlTo('assets/js/jquery.flexslider-min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/jquery.anchor.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/respond.min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/html5shiv.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/custom.js') }}"></script>