<div id="mast-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1>
                    {{ $site->getTitle() }}
                    <p class="lead">{{ $site->option('site_description', $site->site->about) }}</p>
                </h1>
            </div>
            <div class="col-lg-5">

            </div>
        </div>
    </div>
</div>

<hr />