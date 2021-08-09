@if (Auth::user())
<nav class="py-2 bg-blue-dark text-light">
    <div class="container d-flex flex-wrap">
        <ul id="nav-header" class="nav me-auto my-auto">
            <li class="nav-item">Welcome, {{ Auth::user()->name }}</li>
        </ul>
        <form method="post" action="{{ route('logout') }}" onsubmit="return confirm('Adalah anda pasti untuk Logout?');">
            @csrf
            <button class='btn btn-outline-light px-2' type='submit'><i class="bi bi-unlock-fill"></i> Logout</button>
        </form>
    </div>
</nav>

<div class="px-3 py-2 bg-orange text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('home') }}" class="text-center nav-link align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <div class="logo-icon bg-blue-dark rounded-circle p-2">
                    <i class="bi bi-grid-1x2-fill fs-4 text-light"></i>
                </div>
            </a>

            <ul id="nav-master" class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="{{ route('home') }}" class="nav-link text-white-50 text-center {{ (Request::is('/') ? 'active' : '') }}">
                        <i class="bi bi-house d-block mx-auto fs-4" role="img"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}" class="nav-link text-white-50 text-center {{ (Request::is('user') || Request::is('user/*') ? 'active' : '') }}">
                        <i class="bi bi-people d-block mx-auto fs-4" role="img"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}" class="nav-link text-white-50 text-center {{ (Request::is('profil') || Request::is('profil/*') ? 'active' : '') }}">
                        <i class="bi bi-person-circle d-block mx-auto fs-4" role="img"></i>
                        Profile
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
