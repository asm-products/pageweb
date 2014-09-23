@foreach ($events as $event)
    <h3>{{ $event->title }}</h3>
    <p>{{ $event->description }} - <b>{{ $event->start_time }}</b> </p>
    <hr />
@endforeach