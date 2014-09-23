<section
    ng-controller="ContentFeedsCtrl"
    class="panel panel-default no-radius editor-panel-large editor-border-right editor-horizontal-box editor-stretch">
    <div class="panel-heading no-border">
        <h3 class="panel-title">Feeds</h3>
    </div>
    <section id="content-feeds" class="panel-body editor-window-content">
        <div class="editor-window-content-inner bg-gray-lighter-lighten">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <article ng-repeat="feed in feeds" class="content-feeds-item panel margin-bottom-md">
                            <div class="panel-body">
                                <h4>
                                    <span>@{{ feed.type | uppercase }}</span>
                                </h4>
                                <div ng-switch on="feed.type">
                                    <div class="pull-right text-center">
                                        <strong class="h4">@{{ feed.created_at | pgDateTime:'d'}}</strong><br />
                                        <small class="label label-info">@{{ feed.created_at | pgDateTime:'MMM'}}</small>
                                    </div>
                                    <div ng-switch-when="link">
                                        <b>@{{ feed.link_title }}</b>
                                        <p>
                                            <span class="glyphicon glyphicon-globe"></span>
                                            @{{ feed.link }}
                                        </p>
                                    </div>
                                    <div ng-switch-when="status">
                                        @{{ feed.content }}
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>