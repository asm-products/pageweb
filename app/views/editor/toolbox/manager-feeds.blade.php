@foreach ($feeds as $feed)
@if ($feed->type == 'link')
        <h3>{{ $feed->link_title }}</h3>
        <p><a href="{{ $feed->link }}"><b>{{ $feed->link }}</b></a> - {{ $feed->link_description }}</p>
@elseif ($feed->type == 'status')
        <p>{{ $feed->content }}</p>
@endif
    <hr />
@endforeach