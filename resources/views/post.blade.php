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
    </div>
@endsection