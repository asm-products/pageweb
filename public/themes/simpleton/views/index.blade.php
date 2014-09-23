<?php
/**
 * @var $site \PageWeb\Site\SiteContainer
 */
$posts = $site->posts(['paginate' => 2]);

?>

@if ($site->inEditMode())
<h3>Theme Options</h3>
<input id="background-color-option" type="text" value="{{ $site->option('background_color', '#FFFFFF', false) }}" />
<button id="update-option">Save</button>
<script>
    $('#update-option').on('click', function() {
        $.ajax({
            url: '/xhr/sites/' + <?php echo $site->getId() ?> +'/theme/options',
            type: 'POST',
            dateType: 'json',
            data: {'background_color': $('#background-color-option').val()},
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
@endif

<h3>
   {{ $site->option('header', 'Welcome to my site.') }}
</h3>

<div class="container">
    <div class="panel">
        <div class="panel-body">
             <div class="row">
                <div class="col-md-12">
                    @foreach ($posts as $post)
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ $site->urlTo('asset/img/100.gif') }}" />
                            </div>
                            <div class="col-md-10">
                                {{ $post->content }}
                                <p class="lead">&nbsp;</p>
                                <span class="post-time">
                                    {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
