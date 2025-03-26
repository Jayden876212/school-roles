@extends("layouts.base")

@section("title", $page_title)

@section("content")
    <div class="row">
        <section class="col-md-5 mx-auto my-5">
            <form method="POST" class="card">
                @csrf

                <div class="card-header">
                    <h1>Login to an existing account</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="usernameInput" class="form-label">Enter your username:</label>
                        <input type="text" class="form-control" id="usernameInput" name="username">
                        @error("username")
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Enter your password:</label>
                        <input type="password" class="form-control" id="passwordInput" name="password">
                        @error("password")
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route("register.show") }}" class="btn btn-primary">
                        Register
                    </a>
                    <button type="submit" class="btn btn-success">
                        Login To Account
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection