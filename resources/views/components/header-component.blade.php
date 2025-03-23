<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route("home") }}">School Roles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li> --}}

                    <li class="nav-item">
                        <a
                            href="{{ route("account.register.show") }}"
                            class="
                                nav-link
                                @auth disabled @endauth
                                @if ($page_title == "Register") active @endif
                            "
                            @auth aria-disabled="true" @endauth
                            @if ($page_title == "Register") aria-current="page" @endif
                        >
                            Register
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{ route("account.login.show") }}"
                            class="
                                nav-link
                                @auth disabled @endauth
                                @if ($page_title == "Login") active @endif
                            "
                            @auth aria-disabled="true" @endauth
                            @if ($page_title == "Login") aria-current="page" @endif
                        >
                            Login
                        </a>
                    </li>
                </ul>

                @auth
                    <button type="button" class="btn btn-success" title="Currently Logged in User">
                        <i class="fa-solid fa-user"></i>
                        {{ Auth::user()->username }}
                    </button>
                @endauth

                @guest
                    <button type="button" class="btn btn-outline-secondary" title="Signed Out of Account">
                        <i class="fa-regular fa-user"></i>
                        Not currently logged in
                    </button>
                @endguest
            </div>
        </div>
    </nav>
</header>