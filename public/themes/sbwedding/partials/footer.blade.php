<?php $site = Theme::get('site'); ?>

@if ($site->inEditMode())
<link rel="stylesheet" href="{{ $site->urlTo('assets/css/styleselector.css') }}" />
<script type="text/javascript" src="{{ $site->urlTo('assets/js/styleselector.js') }}"></script>
<!-- Styles Selector -->
<div id="style-selector">
    <div class="style-selector-wrapper">
        <h2>Theme Options</h2>
        <div>
            <div class="layout">
                <h3>Header Image URL</h3>
                <input id="headerwrap-background-image-option" type="text" value="{{ $site->option('headerwrap_bg_image', $site->urlTo('assets/img/header-bg.jpg'), false) }}" /><br/>
                <h3>Office Address</h3>
                <textarea id="footer-address-option">{{ $site->option('footer_address', 'Some Avenue, 987 Madrid, Spain', false) }}</textarea> <br/>
                <h3>Email Address</h3>
                <input id="footer-email-option" type="text" value="{{ $site->option('footer_email_address', 'iam@pageweb.co', false) }}" /><br/>
                <h3>Phone Number</h3>
                <input id="footer-phone-option" type="text" value="{{ $site->option('footer_phone_number', '+34-8984-4343', false) }}" /><br/>
                <button id="update-option">Save</button>
                <script>
                    $('#update-option').on('click', function() {
                        $.ajax({
                            url: '/xhr/sites/' + <?php echo $site->getId() ?> +'/theme/options',
                            type: 'POST',
                            dateType: 'json',
                            data: {
                                'footer_address': $('#footer-address-option').val(),
                                'footer_email_address': $('#footer-email-option').val(),
                                'footer_phone_number': $('#footer-phone-option').val(),
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
<script type="text/javascript" src="{{ $site->urlTo('assets/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/jquery-picture-min.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/main.js') }}"></script>
