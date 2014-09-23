<section class="editor-vertical-box editor-window editor-panel-small" id="editor-item-content-window">
    <div class="editor-window-header clearfix">
        <h3>Content Manager</h3>
    </div>
    <div class="editor-window-content-wrapper">
        <div class="editor-window-content">
            <div class="editor-window-content-inner">
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="list-group">
                                    <div ng-model="contentItem"></div>
                                    <a
                                        ng-click="toggleExtendedPanel('content', 'posts')"
                                        class="list-group-item"
                                        ng-class="{opened: extendedPanel.window == 'content-posts'}"
                                        id="editor-item-section-posts"
                                        href="#">
                                        <span
                                            ng-show="extendedPanel.window != 'content-posts'"
                                            class="pull-right glyphicon glyphicon-chevron-right">
                                        </span>
                                        <span
                                            ng-show="extendedPanel.window == 'content-posts'"
                                            class="pull-right glyphicon glyphicon-chevron-left">
                                        </span>
                                        <span class="content-item-icon glyphicon glyphicon-book"></span>
                                        Blog Posts
                                    </a>
                                    <a
                                        ng-click="toggleExtendedPanel('content', 'feeds')"
                                        class="list-group-item"
                                        ng-class="{opened: extendedPanel.window == 'content-feeds'}"
                                        id="editor-item-section-feeds"
                                        href="#">
                                        <span
                                            ng-show="extendedPanel.window != 'content-feeds'"
                                            class="pull-right glyphicon glyphicon-chevron-right">
                                        </span>
                                        <span
                                            ng-show="extendedPanel.window == 'content-feeds'"
                                            class="pull-right glyphicon glyphicon-chevron-left">
                                        </span>
                                        <span class="content-item-icon glyphicon glyphicon-comment"></span>
                                        Status Feeds
                                    </a>
                                    <a
                                        ng-click="toggleExtendedPanel('content', 'albums')"
                                        class="list-group-item"
                                        ng-class="{opened: extendedPanel.window == 'content-albums'}"
                                        id="editor-item-section-albums"
                                        href="#">
                                        <span
                                            ng-show="extendedPanel.window != 'content-albums'"
                                            class="pull-right glyphicon glyphicon-chevron-right">
                                        </span>
                                        <span
                                            ng-show="extendedPanel.window == 'content-albums'"
                                            class="pull-right glyphicon glyphicon-chevron-left">
                                        </span>
                                        <span class="content-item-icon glyphicon glyphicon-camera"></span>
                                        Albums
                                    </a>
                                    <a
                                        ng-click="toggleExtendedPanel('content', 'photos')"
                                        class="list-group-item"
                                        ng-class="{opened: extendedPanel.window == 'content-photos'}"
                                        id="editor-item-section-photos"
                                        href="#">
                                        <span
                                            ng-show="extendedPanel.window != 'content-photos'"
                                            class="pull-right glyphicon glyphicon-chevron-right">
                                        </span>
                                        <span
                                            ng-show="extendedPanel.window == 'content-photos'"
                                            class="pull-right glyphicon glyphicon-chevron-left">
                                        </span>
                                        <span class="content-item-icon glyphicon glyphicon-picture"></span>
                                        Photos
                                    </a>
                                    <a
                                        ng-click="toggleExtendedPanel('content', 'events')"
                                        class="list-group-item"
                                        ng-class="{opened: extendedPanel.window == 'content-events'}"
                                        id="editor-item-section-events"
                                        href="#">
                                        <span
                                            ng-show="extendedPanel.window != 'content-events'"
                                            class="pull-right glyphicon glyphicon-chevron-right">
                                        </span>
                                        <span
                                            ng-show="extendedPanel.window == 'content-events'"
                                            class="pull-right glyphicon glyphicon-chevron-left">
                                        </span>
                                        <span class="content-item-icon glyphicon glyphicon-calendar"></span>
                                        Events
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9 editor-window-expanded">
                                <div class="content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>