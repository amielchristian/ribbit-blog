@extends("layout")

@section("title")
    Create Post
@endsection

@section("content")
    <div class="post-page-container">
        <h1 class="post-page-title">Changed your mind?</h1>
        <form class="post-form" action="{{ route('update') }}" method="post">
            @csrf
            <input name="id" type="hidden" value="{{ $post->id }}"></input>
            <input name="title" type="text" placeholder="Title" value="{{ $post->title}}"></input>
            <input name="author" type="text" placeholder="Author" value="{{ $post->author}}" disabled></input>
            <textarea name="content" placeholder="Your thoughts go here">{{ $post->content}}</textarea>
            <div class="row justify-content-center">
                <button class="btn custom-button" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection