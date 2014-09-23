<section ng-controller="SettingWindowCtrl" class="editor-vertical-box editor-window editor-panel-small"
    id="editor-item-setting-window">

    <div class="editor-window-header clearfix">
        <h3>Settings</h3>
    </div>
    <div class="editor-window-content-wrapper">
        <div class="editor-window-content">
            <div class="editor-window-content-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php /** Show form for setting subdomain */ ?>
                            <div class="panel" ng-show="domainType != 'custom'">
                                <div class="panel-heading bg-success no-border">
                                    <h3 class="panel-title text-white">
                                        Sub Domain
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <form id="form-subdomain" role="form">
                                        <div class="form-group">
                                            <label class="display-inline" for="subdomain"></label>
                                            <input
                                                id="subdomain"
                                                class="form-control"
                                                type="text"
                                                ng-model="subdomain"
                                                name="subdomain"
                                                />
                                        </div>
                                        <button
                                            pg-btn-progress
                                            pg-btn-form="true"
                                            pg-btn-action="setSubDomain()"
                                            data-loading-text="{{ trans('site.updating_domain_settings') }}"
                                            class="btn btn-default btn-block btn-editor"
                                            type="submit">
                                            Change
                                        </button>
                                    </form>

                                    <a class="margin-top-sm" href="#" ng-click="domainType = 'custom'">
                                        Or use a custom domain instead...
                                    </a>
                                </div>
                            </div>
                            <?php /** Show window for setting custom domain */ ?>
                            <div class="panel" ng-show="domainType == 'custom'">
                                <div class="panel-heading bg-success no-border">
                                    <h3 class="panel-title text-white">
                                        Set Custom Domain
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <form id="form-custom-domain" role="form">
                                        <div class="form-group">
                                            <label class="display-inline" for="custom-domain"></label>
                                            <input
                                                id="custom-domain"
                                                class="form-control"
                                                type="text"
                                                ng-model="domain"
                                                name="custom_domain"
                                                />
                                        </div>
                                        <button
                                            pg-btn-progress
                                            pg-btn-form="true"
                                            pg-btn-action="setDomain()"
                                            data-loading-text="{{ trans('site.updating_domain_settings') }}"
                                            class="btn btn-default btn-block btn-editor"
                                            type="submit">
                                            Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading no-border bg-success">
                                    <h3 class="panel-title text-white">
                                        Contact Information
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form">
                                        <div class="form-group">
                                            <label class="display-inline" for="contact_info_email"></label>
                                            <input class="form-control" id="contact_info_email" type="text"
                                                name="contact_email" ng-model="info.email" />
                                        </div>
                                        <div class="form-group">
                                            <label class="display-inline" for="contact_info_phone"></label>
                                            <input class="form-control" id="contact_info_phone" type="text"
                                                name="contact_phone" ng-model="info.phone">
                                        </div>
                                        <div class="form-group">
                                            <label class="display-inline" for="contact_info_address"></label>
                                            <input class="form-control" id="contact_info_address" type="text"
                                                name="contact_address" ng-model="info.address" />
                                        </div>
                                        <button
                                            pg-btn-progress
                                            pg-btn-form="true"
                                            pg-btn-action="updateContact()"
                                            data-loading-text="Updating..."
                                            class="btn btn-default btn-block btn-editor" type="submit">Update
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">

                                <div class="panel-body">
                                    <div class="col-lg-12">
                                    @if (!$user)
                                        <a
                                            class="btn btn-lg btn-block btn-secondary"
                                            href="{{ URL::route('login') }}">
                                            Publish Site
                                        </a>
                                    @else
                                        @if ($site->isSubscribed())
                                        <button
                                            ng-show="editor.site.is_published == 0"
                                            pg-btn-progress
                                            pg-btn-action="publish()"
                                            data-loading-text="Publishing..."
                                            class="btn btn-lg btn-block btn-secondary">
                                            Publish Site
                                        </button>
                                        @else
                                        <a
                                            ng-show="editor.site.is_published == 0"
                                            class="btn btn-lg btn-block btn-secondary"
                                            href="{{ URL::route('sites.subscription.plans', ['site_id' => $site->getId()]) }}">
                                            Publish Site
                                        </a>
                                        @endif
                                        <button ng-show="editor.site.is_published == 1"
                                            class="disabled btn btn-lg btn-block btn-success">
                                            Publish
                                        </button>
                                    @endif
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