<section
    ng-controller="ContentPhotosCtrl"
    class="panel panel-default no-radius editor-panel-large editor-border-right editor-horizontal-box editor-stretch">
    <div class="panel-heading no-border">
        <h3 class="panel-title">Posts</h3>
    </div>
    <section id="content-photos" class="panel-body editor-window-content bg-gray-lighter-lighten">
        <div class="editor-window-content-inner">
            <div class="container-fluid">
                <div class="row">
                    <div ng-repeat="photo in photos" class="content-photos-item col-lg-3">
                        <div class="thumbnail">
                            <img ng-src="@{{ photo.url }}" />
                            <div class="caption">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>