<header class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Global">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <span class="visually-hidden">Home</span>
                <img src="{{ asset('/storage/images/logo/logo.png') }}" alt="" height="40" class="d-inline-block" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>

                    @isAdmin
                        {{-- If your admin menu component renders <a> links, it will work inside the navbar. --}}
                        <li class="nav-item">
                            <x-admin.menu />
                        </li>
                    @endisAdmin
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                            </svg>
                            <span>Profile</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            @if(auth()->user())
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.login') }}">Login</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.register') }}">Register</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
