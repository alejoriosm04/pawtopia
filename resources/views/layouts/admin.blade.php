{{-- Lina Ballesteros --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>@yield('title', __('admin/Layout.title'))</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_abstraction.png') }}">
</head>
<body class="min-vh-100 d-flex flex-column">
    <div class="row g-0 flex-grow-1">
        <div class="p-3 col-md-2 text-white custom-sidebar">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <img src="{{ asset('img/logo_gray.png') }}" alt="Pawtopia" class="logo img-fluid mb-3 logo-adjust" style="max-width: 150px;">
                <span class="fs-4">{{ __('admin/Layout.panel_title') }}</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- {{ __('admin/Layout.home') }}</a></li>
                    <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- {{ __('admin/Layout.products') }}</a></li>
                    <li><a href="{{ route('admin.category.index') }}" class="nav-link text-white">- {{ __('admin/Layout.categories') }}</a></li>
                    <li><a href="{{ route('admin.species.index') }}" class="nav-link text-white">- {{ __('admin/Layout.species') }}</a></li>
                @endif
                <li>
                    <a href="{{ route('home.index') }}" class="mt-2 btn btn-primary text-white">{{ __('admin/Layout.go_back_home') }}</a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class="mt-2 btn btn-primary text-white">{{ __('admin/Layout.go_back_products') }}</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 d-flex flex-column">
    <nav class="p-3 shadow text-end">
    @auth
        <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}" class="profile-font text-decoration-none text-light">
            <span>{{ Auth::user()->name }}</span>
            @if(Auth::user()->image)
                <img class="img-profile rounded-circle" src="{{ asset('/storage/'.Auth::user()->image) }}" style="width: 40px; height: 40px;">
            @else
                <img class="img-profile rounded-circle" src="{{ asset('/img/default_user.png') }}" style="width: 40px; height: 40px;">
            @endif
        </a>
        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-outline-light">{{ __('Logout') }}</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-light">{{ __('Login') }}</a>
    @endauth
</nav>

    <div class="g-0 m-5 flex-grow-1">
        @yield('content')
    </div>
</div>

    <div class="copyright py-4 text-center text-white" style="background-color: #343a40;">
        <div class="container">
            <small>{{ __('admin/Layout.copyright') }}</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
