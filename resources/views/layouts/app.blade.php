<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{ asset('img/logo_abstraction.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3Q+Syx6DqPp13UkjyLDoZsW2gPpXp2gYfK9DgdFe42XIpjDiLbK9tU9CElPfaEaeuVi98gCyvSzrIIr/VVIhw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-UTNPVxRRBlyPpWjHl6KDruYKSPxoJb/6QdAPxXSVTEOyFYfh1wm6sEfY9GpboGEpTmGDeuT1fAzkXtbUonRbpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Pawtopia')</title>

</head>
<body>
<div class="header-top_area bg-dark py-2 text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-white">+57 314 216 8014</a></li>
                    <li class="list-inline-item"><a href="#" class="text-white">Mon - Sat 10:00 - 7:00</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-4 text-end">
                <ul class="social_media_links list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="bi bi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="bi bi-google"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="bi bi-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark py-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Pawtopia" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                <a class="nav-link active" href="{{ route('pet.index') }}" style="color: #DB4D20;">My Pets</a>
                <a class="nav-link" href="{{ route('admin.product.index') }}">Admin Panel</a>
            </div>
        </div>
    </div>
</nav>

<header class="custom-header">
    <div class="container">
        <h3 class="mb-0">@yield('subtitle', 'Home')</h3>
    </div>
</header>

<div class="container my-4">
    @yield('content')
</div>

<!-- footer -->
<footer class="bg-dark text-white text-center">
    <div class="container">
        <small>&copy; Pawtopia - All Rights Reserved</small>
    </div>
</footer>
<!-- footer -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
