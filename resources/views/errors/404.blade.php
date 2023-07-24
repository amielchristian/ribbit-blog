@extends("layout")

@section("title")
    Error 404
@endsection

@section("content")
    <a class="error-container" href="{{ route('index') }}">
        <div class="error-text">
            <p class='error-message'>Error 404</p>
            <p class='tip'>Looks like you ran into some trouble. Click here to go back to the homepage.</p>
        </div>
        <img class="error-icon-display" src="{{ asset('images/icon.png') }}">
    </a>
@endsection