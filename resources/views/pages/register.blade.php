@extends("layouts.base")

@section("title", $page_title)

@section("content")
    <div class="row">
        <section class="col-md-5 mx-auto my-5">
            <form method="POST" class="card">
                @csrf

                <div class="card-header">
                    <h1>Register an account</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="usernameInput" class="form-label">Enter your username:</label>
                        <input type="text" class="form-control" id="usernameInput" name="username">

                        @error("username")
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="passwordInput" class="form-label">Enter your password:</label>
                        <input type="password" class="form-control" id="passwordInput" name="password">

                        @error("password")
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmPasswordInput" class="form-label">Re-enter your password to confirm:</label>
                        <input type="password" class="form-control" id="confirmPasswordInput" name="confirm_password">

                        @error("confirm_password")
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="firstNameInput" class="form-label">Enter your first name:</label>
                        <input type="text" class="form-control" id="firstNameInput" name="first_name">

                        @error("first_name")
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lastNameInput" class="form-label">Enter your last name:</label>
                        <input type="text" class="form-control" id="lastNameInput" name="last_name">

                        @error("last_name")
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="studentRoleInput" value="student" checked>
                        <label class="form-check-label" for="studentRoleInput">
                            Student
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="teacherRoleInput" value="teacher">
                        <label class="form-check-label" for="teacherRoleInput">
                            Teacher
                        </label>
                    </div>

                    @error("role")
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="card-footer">
                    <a href="{{ route("login.show") }}" class="btn btn-primary">
                        Login
                    </a>
                    <button type="submit" class="btn btn-success">
                        Create Account
                    </button>

                    @error("database")
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </form>
        </section>
    </div>
@endsection