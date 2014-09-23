<?php
/**
 * @var $site \PageWeb\Site\Site
 */
?>

<div class="container">
    <div class="panel">
        <div class="panel-body">
             <div class="row">
                @foreach ($photos as $photo)
                    <div class="col-md-4">
                        <img src="{{ $photo->url }}" style="width: 300px; height: 200px;" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>