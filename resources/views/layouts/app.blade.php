<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo_abstraction.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Home.title'))</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DB4D20;">
    <div class="container-fluid">
        <a class="navbar-brand ms-3" href="{{ route('home.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Brand Logo" style="width: 100px;" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex ms-lg-1 my-2 my-lg-0" action="{{ route('product.search') }}" method="GET">
                <div class="input-group" style="margin-left: -10px; width: 350px;">
                    <input class="form-control" name="search" type="search" placeholder="{{ __('Layout.search_placeholder') }}" aria-label="Search"
                           style="border-radius: 20px; background-color: #f9f9f9; padding-right: 40px; width: calc(100% - 50px);">
                    <button class="btn btn-light d-flex align-items-center justify-content-center" type="submit"
                            style="border-radius: 50%; width: 45px; height: 40px; margin-left: -55px;">
                        <i class="bi bi-search" style="font-size: 1rem; color: #DB4D20; margin-left: 20px;"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                @auth
                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('admin.home.index') }}">
                                <i class="bi bi-gear-fill me-1"></i> {{ __('Layout.admin_panel') }}
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('pets.recommendations') }}">
                            <i class="bi bi-star-fill me-1"></i> {{ __('Layout.recommendations') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('user.orders') }}">
                            <i class="bi bi-bag-fill me-1"></i> {{ __('Layout.my_orders') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('user.show', ['id' => Auth::user()->id]) }}">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-light">{{ __('Logout') }}</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('login') }}">
                            <i class="bi bi-person-circle me-1"></i> {{ __('Login') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('register') }}">
                            <i class="bi bi-pencil-square me-1"></i> {{ __('Register') }}
                        </a>
                    </li>
                @endauth

                <li class="nav-item">
                    <a class="nav-link text-light me-3 d-flex align-items-center" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart me-1"></i> {{ __('Cart.title') }}
                        @if (session('cart_count') > 0)
                            <span class="badge bg-danger">{{ session('cart_count') }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="bg-light py-2">
    <div class="container d-flex justify-content-between align-items-center flex-wrap" style="margin-left: 15px;">
        <div class="text-center">
            <div class="nav-item d-inline-block">
                <a class="nav-link text-dark mx-2" href="{{ route('product.index') }}">
                    {{ __('Category.all_products') }}
                </a>
            </div>
            @if(isset($viewData['species_categories']))
                @foreach($viewData['species_categories'] as $species)
                    <div class="nav-item dropdown d-inline-block">
                        <a class="nav-link text-dark mx-2 dropdown-toggle" href="{{ route('product.filterBySpecies', ['species' => $species->getName()]) }}" id="dropdown{{ $species->getId() }}" data-bs-toggle="dropdown" aria-expanded="false" onclick="window.location.href='{{ route('product.filterBySpecies', ['species' => $species->getName()]) }}';">
                            {{ $species->getName() }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown{{ $species->getId() }}">
                            @foreach($species->getCategories() as $category)
                                <li><a class="dropdown-item" href="{{ route('product.filterByCategory', ['category' => $category->getId()]) }}">{{ $category->getName() }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="nav-item d-inline-block mt-2 mt-md-0" style="position: absolute; right: 15px;">
            <a href="{{ route('pet.index') }}" class="nav-link text-dark mx-2">
                <i class="material-icons" style="font-size: 18px;">&#xe91d;</i> {{ __('Pet.my_pets') }}
            </a>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-start mt-3">
    @if (isset($viewData['breadcrumbs']))
        {!! $viewData['breadcrumbs'] !!}
    @endif
</div>
<div class="col-md-8">
    @yield('breadcrumbs')
</div>
<div class="container my-4">
    @yield('content')
</div>

<div class="bg-dark py-4 text-center text-white">
    <div class="container">
        <small>{{ __('Layout.copyright') }}</small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
