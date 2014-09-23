@foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <p> {{ substr($post->content, 0, 500) }}</p>
    <hr/>
@endforeach