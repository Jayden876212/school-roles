@extends("layouts.base")

@section("title", $page_title)

@section("content")
    <h1>Home page</h1>
    @auth
        @if ($role == "student")
            <p>student</p>
            <p>{{ $role }}</p>
        @elseif ($role == "teacher")
            <p>teacher</p>
            <p>{{ $role }}</p>
        @else
            <p>not student or teacher but logged in</p>
        @endif
    @endauth
    @guest
        not logged in
    @endguest
@endsection