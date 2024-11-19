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
    <div class="custom-sidebar p-3 col-md-2 text-white">
        <span class="close-sidebar" onclick="toggleSidebar()">&larr;</span>
        <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none d-flex flex-column align-items-center">
            <img src="{{ asset('img/logo_gray.png') }}" alt="Pawtopia" class="logo img-fluid mb-3" style="max-width: 150px;">
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
    <div class="col-md-10 d-flex flex-column content-area">
        <nav class="p-3 shadow text-end" style="background-color: #495057;">
            <button class="btn btn-light toggle-sidebar" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            @auth
                <div class="d-inline-block me-3">
                    <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}" class="profile-font text-decoration-none text-light d-flex align-items-center">
                        <i class="bi bi-person-circle me-2"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                </div>
                <form id="logout" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">{{ __('admin/Layout.logout') }}</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light">{{ __('admin/Layout.login') }}</a>
            @endauth
        </nav>

        <main class="flex-grow-1">
            <div class="container my-4">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<footer>
    <div class="footer-content">
        <div class="footer-column">
            <h5>{{ __('Layout.about_us') }}</h5>
            <p>{{ __('Layout.about_text') }}</p>
        </div>
        <div class="footer-column">
            <h5>{{ __('Layout.quick_links') }}</h5>
            <ul>
                <li><a href="{{ route('home.index') }}">{{ __('Layout.home') }}</a></li>
                <li><a href="{{ route('product.index') }}">{{ __('Layout.products') }}</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h5>{{ __('Layout.follow_us') }}</h5>
            <div class="social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </div>
    <small>{!! __('Layout.rights_reserved') !!}</small>
</footer>
<script src="{{ asset('js/admin/layout/sidebar_responsive.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
