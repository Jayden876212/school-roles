@extends("layouts.base")

@section("title", $page_title)

@section("content")
    <h1>Home page</h1>
    @auth
        @if (Auth::user()->role("student"))
            <p>student</p>
        @elseif (Auth::user()->role("teacher"))
            <p>teacher</p>
        @else
            <p>not student or teacher but logged in</p>
        @endif
    @endauth
    @guest
        not logged in
    @endguest
@endsection