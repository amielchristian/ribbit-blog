@extends("layout")

@if ($post == null)
    {{ abort(404); }}
@endif

@section("title")
    Edit Post
@endsection

@section("content")
    <div class="post-page-container editor-container">
        <h1 class="post-page-title">Edit Post</h1>
        <form class="post-form" action="{{ route('update') }}" method="post">
            @csrf
            <input name="id" type="hidden" value="{{ $post->id }}"></input>
            <input required maxlength="64" name="title" type="text" placeholder="Title" value="{{ $post->title}}"></input>
            <input name="author" maxlength="64" type="text" placeholder="Author" value="{{ $post->author}}" disabled></input>
            <p class="tip md-tip">tip: this text editor uses the Markdown markup language – <a href="https://www.markdownguide.org/">click here</a> to learn more!</p>
            <textarea required name="content" placeholder="Your thoughts go here">{{ $post->content}}</textarea>
            <div class="row justify-content-center">
                <button class="btn custom-button" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection