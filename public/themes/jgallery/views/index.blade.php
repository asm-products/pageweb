<div id="gallery">
    @foreach ($site->albums() as $album)
        @if ($album->photos->count() > 0)
        <div class="album" data-jgallery-album-title="{{ $album->title }}">
            <h1>{{ $album->title }}</h1>
            @foreach($album->photos as $photo)
            <a href="{{ $photo->url }}">
                <img src="{{ $photo->url }}" alt=""  data-jgallery-bg-color="#3e3e3e" data-jgallery-text-color="#fff" />
            </a>
            @endforeach
        </div>
        @endif
    @endforeach
</div>
@section('scripts')
<script type="text/javascript">
    $( function() {
        $( '#gallery' ).jGallery( {
            'mode': 'full-screen',
            autostart: true,
            canClose: false,
            zoomSize: 'fill'
        } );
    } );
</script>
@stop