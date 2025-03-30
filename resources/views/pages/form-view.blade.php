@extends("layouts.base")

@section("title", $page_title)

@section("content")
    <h1>{{ $page_title }}</h1>
    <form method="POST">
        @csrf

        <input type="text" name="input1" placeholder="request 1">

        @error("input1")
            {{ $message }}
        @enderror

        <input type="text" name="input2" placeholder="request 2">

        @error("input2")
            {{ $message }}
        @enderror

        <button type="submit" formaction="{{ route("request1") }}">Request 1</button>
        <button type="submit" formaction="{{ route("request2") }}">Request 2</button>
    </form>
@endsection