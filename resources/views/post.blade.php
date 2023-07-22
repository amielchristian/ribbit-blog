@extends("layout")

@section("title")
    {{ $post->title }}
@endsection
@section("content")
    <div class="post-page-container">
        <div>
            <h1 class="post-page-title">{{ $post->title }}</h1>
            <div class="post-page-misc">
                <p>by {{ $post->author }}</p>
                <div class="post-misc">
                    <p>{{ date_format($post->created_at, "M d, Y h:m A") }}</p>
                    @if ($post->updated_at != null)
                        <p>Updated {{date_format($post->updated_at, "M d, Y h:m A") }}</p>
                    @endif
                </div>
            </div>
        </div>
        <br><hr><br>
        <div class="post-text">
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection
