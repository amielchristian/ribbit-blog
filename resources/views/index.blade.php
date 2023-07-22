@extends("layout")

@section("content")
<div class="post-grid">
    @foreach ($posts as $post)
        <div class="post-container">
            <div class="post-info">
                <h1 class="post-title"><b>{{ $post->title }}</b></h1>
                <div class="post-misc">
                    <p class="post-author">by {{ $post->author }}</p>
                    <p class="post-time">{{ date_format($post->created_at, "M d, Y") }}</p>
                </div>
            </div>
            <hr>
            <div class="post-text">
                <p class="truncate-overflow">{{ $post->content }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection
