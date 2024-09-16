<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pawtopia')</title>
</head>
<body>
<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}" style="color: #DB4D20;">Pawtopia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{ route('home.index') }}" style="color: #DB4D20;">Home</a>
                <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
                <a class="nav-link active" href="{{ route('pet.index') }}" style="color: #DB4D20;">My Pets</a>
                <a class="nav-link active" href="{{ route('cart.index') }}" style="color: #DB4D20;">Cart</a>
                <a class="nav-link active" href="{{ route('admin.product.index') }}">Admin Panel</a>
            </div>
        </div>
    </div>
</nav>

<header class="masthead text-white text-center py-4" style="background-color: #DB4D20;">
    <div class="container d-flex align-items-center flex-column">
        <h2>@yield('subtitle', 'Pawtopia')</h2>
    </div>
</header>
<!-- header -->

<div class="container my-4">
    @yield('content')
</div>

<!-- footer -->
<div class="bg-dark py-4 text-center text-white">
    <div class="container">
        <small>
            Copyright - Pawtopia
        </small>
    </div>
</div>
<!-- footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
</body>
</html>
