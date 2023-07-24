@extends("layout")

@section("title")
    Create Post
@endsection

@section("content")
    <div class="post-page-container editor-container">
        <h1 class="post-page-title">What's on your mind?</h1>
        <form class="post-form" action="{{ route('store') }}" method="post">
            @csrf
            <input required name="title" type="text" placeholder="Title"></input>
            <input required name="author" type="text" placeholder="Author" value="Guest"></input>
            <p class="tip md-tip">tip: this text editor uses the Markdown markup language – <a href="https://www.markdownguide.org/">click here</a> to learn more!</p>
            <textarea required name="content" placeholder="Your thoughts go here"></textarea>
            <div class="row justify-content-center">
                <button class="btn custom-button" type="submit">Publish</button>
            </div>
            <div class="row justify-content-center">
                <p class="row justify-content-center tip session-tip">note: after publishing, you can only edit or delete this post before your browser session expires.</p>
            </div>
        </form>
    </div>
@endsection