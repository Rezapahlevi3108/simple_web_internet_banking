<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Bank Kelompok 2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                @if (Auth::check())
                    <div class="btn-group">
                        <button type="button" class="btn btn-transparant dropdown-toggle m-0" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{Auth::user()->name}}
                            <img height="25" width="25" class="rounded-circle ms-2" src="{{ $user->UserDetail->profile_photo ? asset('profile/' . $user->UserDetail->profile_photo) : asset('img/profile.svg') }}">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <x-button onclick="location.href = '{{ route('login') }}'" class="me-2 py-2 px-3">Login</x-button>
                    <x-button onclick="location.href = '{{ route('register') }}'" class="py-2 px-3">Register</x-button>
                @endif
            </div>
        </div>
    </div>
</nav>