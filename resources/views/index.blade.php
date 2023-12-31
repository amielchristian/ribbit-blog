@extends("layout")

@section("title")
    Home
@endsection
@section("content")
<div class="post-grid">
    @foreach ($posts as $post)
        <a href="{{route('showPost', ['post_id' => $post->id])}}" class="post-container motion-safe:hover:scale-[1.01]">
            <div>
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-misc">
                    <p class="post-author">{{ $post->author }}</p>
                    <p class="post-time">{{ date_format($post->created_at, "M d, Y") }}</p>
                </div>
            </div>
            <hr>
            <p class="truncate-overflow">{{ $post->content }}</p>
        </a>
    @endforeach
</div>
@endsection
