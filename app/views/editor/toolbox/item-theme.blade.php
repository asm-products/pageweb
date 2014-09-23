<section ng-controller="ThemeWindowCtrl" class="editor-vertical-box editor-window editor-panel-large" id="editor-item-theme-window">
    <div class="editor-window-header clearfix">
        <h3>Choose Theme</h3>
        <div class="pull-right">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label for="filter_category"></label>
                    <select ng-model="categoryProp" id="filter_category" class="form-control">
                        <option value=""> -- All --</option>
                        <option ng-repeat="category in categories" ng-value="category.id">
                            @{{ category.name }}
                        </option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="editor-window-content-wrapper">
        <div class="editor-window-content">
            <div class="editor-window-content-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4" ng-repeat="theme in themes | themesInCategory:categoryProp">
                                <div class="thumbnail">
                                    <img ng-src="@{{ theme.preview.thumb }}" style="width: 200px; height: 150px;" />
                                    <div class="caption">
                                        <h3>@{{ theme.title }}</h3>
                                        <p>@{{ theme.description }}</p>
                                        <p class="centered">
                                            {{-- This button is displayed this theme is not the sites theme --}}
                                            @if (Sentry::check())
                                            <a
                                                pg-btn-progress
                                                pg-btn-action="chooseTheme(theme)"
                                                data-loading-text="Setting current theme..."
                                                ng-show="themeId != theme.id"
                                                href="#"
                                                id="theme-@{{ theme.name }}"
                                                class="editor-select-theme centered btn btn-block btn-primary">
                                                Use Theme
                                            </a>
                                            @else
                                            <a
                                                ng-show="themeId != theme.id"
                                                href="@{{ theme.url }}"
                                                id="theme-@{{ theme.name }}"
                                                class="editor-select-theme centered btn btn-primary">
                                                Use Theme
                                            </a>
                                            @endif
                                            {{-- This button is displayed if this is sites current theme --}}
                                            <a
                                                ng-show="themeId == theme.id"
                                                class="btn btn-info btn-block disabled">
                                                Current Theme
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>