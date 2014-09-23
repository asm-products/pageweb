<?php $site = Theme::get('site'); ?>
<!-- ========== FOOTER SECTION ========== -->
<section id="contact" name="contact"></section>
<div id="f">
    <div class="container">
        <div class="row">
            <h3><b>CONTACT US</b></h3>
            <br>
            <div class="col-lg-4">
                <h3><b>Send Us A Message:</b></h3>
                <h3{{ $site->option('footer_email_address', 'support@pageweb.co') }}</h3>
                <br>
            </div>

            <div class="col-lg-4">	
                <h3><b>Call Us:</b></h3>
                <h3>{{ $site->option('footer_phone_number', '+55 3984-4389') }}</h3>
                <br>
            </div>

            <div class="col-lg-4">
                <h3><b>We Are Social</b></h3>
                <p>
                    <a href="index.html#"><i class="icon-facebook"></i></a>
                    <a href="index.html#"><i class="icon-twitter"></i></a>
                    <a href="index.html#"><i class="icon-envelope"></i></a>
                </p>
                <br>
            </div>
        </div>
    </div>
</div><!-- /container -->
</div><!-- /f -->
<div id="c">
    <div class="container">
        <p>Powered By <a href="http://www.pageweb.co">Pageweb</a></p>
    </div>
</div>


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
<script type="text/javascript" src="{{ $site->urlTo('assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/smoothscroll.js') }}"></script>
<script type="text/javascript" src="{{ $site->urlTo('assets/js/main.js') }}"></script>