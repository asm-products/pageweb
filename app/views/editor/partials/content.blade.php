<section id="editor-content" class="editor-section editor-panel-open">
    <section class="editor-horizontal-box editor-stretch">
        <section id="editor-panel-container" class="editor-aside editor-stretch">
            <aside ng-controller="PanelCtrl" id="editor-panel" class="editor-aside editor-border-right">
                <div ng-switch on="panel.window" class="editor-stretch">
                    <div ng-switch-when="theme" class="editor-stretch">
                        <div ng-include="'template/panel-theme.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="content" class="editor-stretch">
                        <div ng-include="'template/panel-content.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="setting" class="editor-stretch">
                        <div ng-include="'template/panel-setting.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="addon" class="editor-stretch">
                        <div ng-include="'template/panel-addon.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="subscription" class="editor-stretch">
                        <div ng-include="'template/panel-subscription.html'" class="editor-stretch"></div>
                    </div>
                </div>
            </aside>
            <aside ng-controller="ExtendedPanelCtrl" id="editor-panel-extended" class="editor-aside">
                <div ng-switch on="extendedPanel.window" class="editor-stretch">
                    <div ng-switch-when="content-posts" class="editor-stretch">
                        <div ng-include="'template/extended-panel-content-posts.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="content-feeds" class="editor-stretch">
                        <div ng-include="'template/extended-panel-content-feeds.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="content-albums" class="editor-stretch">
                        <div ng-include="'template/extended-panel-content-albums.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="content-photos" class="editor-stretch">
                        <div ng-include="'template/extended-panel-content-photos.html'" class="editor-stretch"></div>
                    </div>
                    <div ng-switch-when="content-events" class="editor-stretch">
                        <div ng-include="'template/extended-panel-content-events.html'" class="editor-stretch"></div>
                    </div>
                </div>
            </aside>
        </section>
        <section ng-controller="PreviewCtrl" id="editor-site-preview" class="editor-horizontal-box editor-stretch">
           <iframe id="editor-preview-frame" src="{{ $frameSrc }}"></iframe>
        </section>
    </section>
</section>

<script type="text/ng-template" id="template/panel-theme.html">
    @include ('editor.toolbox.item-theme')
</script>
<script type="text/ng-template" id="template/panel-content.html">
    @include ('editor.toolbox.item-content')
</script>
<script type="text/ng-template" id="template/panel-setting.html">
    @include ('editor.toolbox.item-setting')
</script>
<script type="text/ng-template" id="template/panel-addon.html">
    @include ('editor.toolbox.item-addon')
</script>
<script type="text/ng-template" id="template/panel-subscription.html">
    @include ('editor.toolbox.item-subscription')
</script>
<script type="text/ng-template" id="template/extended-panel-content-posts.html">
    @include ('editor.toolbox.extended-item-content-posts')
</script>
<script type="text/ng-template" id="template/extended-panel-content-feeds.html">
    @include ('editor.toolbox.extended-item-content-feeds')
</script>
<script type="text/ng-template" id="template/extended-panel-content-albums.html">
    @include ('editor.toolbox.extended-item-content-albums')
</script>
<script type="text/ng-template" id="template/extended-panel-content-photos.html">
    @include ('editor.toolbox.extended-item-content-photos')
</script>
<script type="text/ng-template" id="template/extended-panel-content-events.html">
    @include ('editor.toolbox.extended-item-content-events')
</script>