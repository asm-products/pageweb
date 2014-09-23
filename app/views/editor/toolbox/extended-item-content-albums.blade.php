<section
    ng-controller="ContentAlbumsCtrl"
    class="panel panel-default no-radius editor-panel-large editor-border-right editor-horizontal-box editor-stretch">
    <div class="panel-heading no-border">
        <h3 class="panel-title">Albums</h3>
    </div>
    <section id="content-albums" class="panel-body editor-window-content bg-gray-lighter-lighten">
        <div class="editor-window-content-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div ng-repeat="album in albums" class="content-albums-item col-lg-4">
                            <div class="thumbnail">
                                <img ng-src="@{{ album.cover_photo }}" />
                                <div class="caption">
                                    <h3>@{{ album.title }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>