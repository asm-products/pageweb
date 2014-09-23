<aside ng-controller="ToolboxCtrl" id="editor-sidebar" class="editor-aside">
    <section class="editor-vertical-box">
        <nav>
            <ul>
                <li>
                    <a ng-click="togglePanel('theme')" title="Theme" class="editor-toolbox-item item-theme" href="#">
                        <span class="entypo-brush"></span>
                        <b>Theme</b>
                    </a>
                </li>
                <li>
                    <a ng-click="togglePanel('content')" title="Content" class="editor-toolbox-item item-section" href="#">
                        <span class="entypo-window"></span>
                        <b>Manager</b>
                    </a>
                </li>
                <li>
                    <a ng-click="togglePanel('setting')" title="Settings" class="editor-toolbox-item item-setting" href="#">
                        <span class="entypo-cog"></span>
                        <b>Settings</b>
                    </a>
                </li>
                <li>
                    <a ng-click="togglePanel('addon')" title="Addons" class="editor-toolbox-item item-addon" href="#">
                        <span class="entypo-attach"></span>
                        <b>Addons</b>
                    </a>
                </li>
                <li>
                    <a ng-click="togglePanel('subscription')" title="Subscription" class="editor-toolbox-item item-subscription" href="#">
                        <span class="entypo-credit-card"></span>
                        <b>Subscription</b>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
</aside>