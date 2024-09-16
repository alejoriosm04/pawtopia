<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', __('admin/Layout.title'))</title>
</head>
<body class="min-vh-100 d-flex flex-column">
    <div class="row g-0 flex-grow-1">
        <!-- sidebar -->
        <div class="p-3 col-md-2 text-white bg-dark">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4">{{ (__('admin/Layout.panel_title')) }}</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- {{ __('admin/Layout.home') }}</a></li>
                <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- {{ __('admin/Layout.products') }}</a></li>
                <li><a href="{{ route('admin.category.index') }}" class="nav-link text-white">- {{ __('admin/Layout.categories') }}</a></li>
                <li><a href="{{ route('admin.species.index') }}" class="nav-link text-white">- {{ __('admin/Layout.species') }}</a></li>
                <li>
                    <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">{{ __('admin/Layout.go_back_home') }}</a>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class="mt-2 btn bg-primary text-white">{{ __('admin/Layout.go_back_products') }}</a>
                </li>
            </ul>
        </div>
        <!-- sidebar -->

        <div class="col-md-10 d-flex flex-column"> <!-- Ajuste del tamaño de la columna del contenido -->
            <nav class="p-3 shadow text-end">
                <span class="profile-font">{{ __('admin/Layout.profile_name') }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
            </nav>
            <div class="g-0 m-5 flex-grow-1">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="copyright py-4 text-center text-white" style="background-color: #343a40;">
        <div class="container">
            <small>
                {{ __('admin/Layout.copyright') }} -
                <a class="text-reset fw-bold text-decoration-none" target="_blank"
                   href="https://twitter.com/danielgarax">
                    Daniel Correa
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
    </script>
</body>
</html>
