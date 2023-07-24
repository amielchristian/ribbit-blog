@extends("layout")

@if ($post == null)
    {{ abort(404); }}
@endif

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
                    <p>{{ date_format($post->created_at, "M d, Y h:i A") }} UTC</p>
                    @if ($post->updated_at != null)
                        <p>Updated {{date_format($post->updated_at, "M d, Y h:i A") }} UTC</p>
                    @endif
                </div>
            </div>
        </div>
        <br><hr><br>
        <div class="post-text">
            @markdown
{{ $post->content }}
            @endmarkdown
        </div>
        <br><hr><br>
        <div class="row justify-content-end post-actions">
            <form action="{{ route('downloadPost', ['post_id' => $post->id]) }}">
                <input type="hidden" name="id" value="{{ $post->id }}"></input>
                <button class="btn custom-button">Download</button>
            </form>
            @if ($post->session_id == Session::getId())
                <button class="btn custom-button" onclick="window.location.href='{{ route('updatePost', ['post_id' => $post->id]) }}'">Edit</button>
                <form action="{{ route('deletePost', ['post_id' => $post->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn custom-button" type="submit" value="Delete">Delete</button>
                </form>
            @endif
        </div>
        <div>
            <h5 class='comments-header'>Comments</h5>
            <form method='post' action='{{ route("comment") }}'>
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}"></input>
                <div class='comment-container'>
                    <textarea required name="content" placeholder="Your thoughts go here" class='write-comment'></textarea>
                    <div class="row justify-content-end comment-actions">
                        <div class="d-flex flex-row align-items-center">
                            <p>Commenting as&nbsp;</p>
                            <input required class="comment-author" maxlength="64" type="text" name="author" value="Guest" placeholder="Author"></input>
                        </div>
                        <button class="btn custom-button" type="submit">Comment</button>
                    </div>
                </div>
            </form>

            @foreach ($comments as $comment)
                <div class="comment-container">
                    <div class='comment-info'>
                        <b><p>{{ $comment->author }}</p></b>
                        <p class='post-misc'>{{ date_format($comment->created_at, "M d, Y h:i A") }} UTC</p>
                    </div>
                    <p class='comment-contents'>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection