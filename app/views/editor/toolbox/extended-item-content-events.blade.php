<section
    ng-controller="ContentEventsCtrl"
    class="panel panel-default no-radius editor-panel-large editor-border-right editor-horizontal-box editor-stretch">
    <div class="panel-heading no-border">
        <h3 class="panel-title">Events</h3>
    </div>
    <section id="content-events" class="panel-body editor-window-content bg-gray-lighter-lighten">
        <div class="editor-window-content-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <article ng-repeat="event in events" class="panel bg-white margin-bottom-md">
                            <div class="panel-body">
                                <div class="media">
                                    <a href="#" class="pull-left">
                                        <span class="media-object glyphicon glyphicon-calendar icon-3x"></span>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#">
                                                @{{ event.title }}
                                            </a>
                                        </h4>
                                        <p>
                                            @{{ event.description }}
                                        </p>
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