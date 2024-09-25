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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Home.title'))</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DB4D20;">
    <div class="container-fluid d-flex align-items-center">
        <a class="navbar-brand ms-5" href="{{ route('home.index') }}" style="color: white;">
            <img src="{{ asset('img/logo.png') }}" alt="Brand Logo" style="width: 120px;" />
        </a>

        <form class="d-flex ms-5" action="{{ route('product.search') }}" method="GET" style="width: 35%; position: relative; align-items: center;">
            <input class="form-control me-2" name="search" type="search" placeholder="{{ __('Layout.search_placeholder') }}" aria-label="Search" style="border-radius: 25px; padding-left: 20px; border: 2px solid #fff; background-color: #f9f9f9;">
            <button class="btn btn-light" type="submit" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); border-radius: 50%; width: 35px; height: 35px;">
                <i class="bi bi-search" style="font-size: 1.5rem; color: #DB4D20;"></i>
            </button>
        </form>
        <div class="d-flex align-items-center ms-auto">
            @auth
                @if(Auth::user()->role == 'admin')
                    <a class="nav-link me-3" href="{{ route('admin.home.index') }}" aria-label="Admin Panel" style="color: white;">
                        <i class="bi bi-gear-fill" style="font-size: 1.5rem;"></i> {{ __('Layout.admin_panel') }}
                    </a>
                @endif

                <a href="{{ route('user.show', ['id' => Auth::user()->id]) }}" class="profile-font text-decoration-none text-light">
                    <span>{{ Auth::user()->name }}</span>

    
                    @if(Auth::user()->image) 
                        <img class="img-profile rounded-circle" src="{{ asset('/storage/'.Auth::user()->image) }}" style="width: 40px; height: 40px;">
                    @else 
                        <img class="img-profile rounded-circle" src="{{ asset('/img/default_user.png') }}" style="width: 40px; height: 40px;">
                    @endif
                </a>

                <form id="logout" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-light">{{ __('Logout') }}</button>
                </form>
            @else
                <a class="nav-link me-3" href="{{ route('login') }}" style="color: white;">
                    <i class="bi bi-person-circle" style="font-size: 2rem;"></i> {{ __('Login') }}
                </a>
                <a class="nav-link me-3" href="{{ route('register') }}" style="color: white;">
                    {{ __('Register') }}
                </a>
            @endauth

            <a class="nav-link me-3" href="{{ route('cart.index') }}" aria-label="Shopping Cart" style="color: white;">
                <i class="bi bi-cart" style="font-size: 2rem;"></i> {{ __('Cart.title') }}
                @if (session('cart_count') > 0)
                    <span class="badge bg-danger" style="position: relative; top: -10px;">{{ session('cart_count') }}</span>
                @endif
            </a>
        </div>

    </div>
</nav>

<!-- Navigation for Categories -->
<div class="bg-light py-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="text-center">
            <div class="nav-item d-inline-block">
                <a class="nav-link text-dark mx-2" href="{{ route('product.index') }}">
                    {{ __('Category.all_products') }}
                </a>
            </div>

        @if(isset($viewData['species_categories']))
            @foreach($viewData['species_categories'] as $species)
        <div class="nav-item dropdown d-inline-block">
            <a class="nav-link text-dark mx-2" href="{{ route('product.filterBySpecies', ['species' => $species->getName()]) }}">
                {{ $species->getName() }}
            </a>
            <ul class="dropdown-menu">
                @foreach($species->getCategories() as $category)
                    <li><a class="dropdown-item" href="{{ route('product.filterByCategory', ['category' => $category->getId()]) }}">{{ $category->getName() }}</a></li>
                @endforeach
            </ul>
        </div>
             @endforeach
        @endif
        </div>

        <div class="nav-item d-inline-block">
            <a href="{{ route('pet.index') }}" class="nav-link text-dark mx-2">
                <i class="bi bi-house-heart-fill"></i> {{ __('Pet.my_pets') }}
            </a>
        </div>
    </div>
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
