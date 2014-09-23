<div class="container">
    <div class="panel">
        <div class="panel-body">
             <div class="row">
                <div class="col-md-12">
                    @foreach ($albums as $album)
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{ $site->urlTo('asset/img/100.gif') }}" />
                            </div>
                            <div class="col-md-10">
                                {{ $album->getId() }}
                                <a href="{{ $site->urlRoute('photos', ['id' => $album->getId()]) }}">
                                    {{ $album->title }}
                                </a>
                                <p class="lead">&nbsp;</p>
                                <span class="post-time">
                                    {{ Carbon\Carbon::parse($album->created_at)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
