@extends("layout")

@section("title")
    Create Post
@endsection

@section("content")
    <div class="post-page-container">
        <h1 class="post-page-title">What's on your mind?</h1>
        <form class="post-form" action="{{ route('store') }}" method="post">
            @csrf
            <input name="title" type="text" placeholder="Title"></input>
            <input name="author" type="text" placeholder="Author" value="Guest"></input>
            <textarea name="content" placeholder="Your thoughts go here"></textarea>
            <div class="row justify-content-center">
                <button class="btn custom-button" type="submit">Publish</button>
            </div>
        </form>
    </div>
@endsection