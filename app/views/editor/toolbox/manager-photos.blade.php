<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        @foreach ($photos as $photo)
            <div class="media">
                <div class="pull-left">
                    <img class="media-object" style="width: 100px; height: 100px;" src="{{ $photo->url }}" />
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $photo->caption or 'No Caption' }}</h4>
                    <p><small>{{ $photo->url }}</small></p>
                    <p><b>{{ $photo->album->title }}</b></p>
                </div>
            </div>
            <hr />
        @endforeach
        </div>
    </div>
</div>
