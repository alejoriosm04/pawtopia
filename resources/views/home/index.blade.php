{{-- Lina Ballesteros --}}
@extends('layouts.app')
@section('title', __('Home.title'))

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner custom-carousel-height">
        <div class="carousel-item active">
            <img src="{{ asset('img/banner/slider_1.jpg') }}" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{ __('Home.slider_heading_1') }}</h5>
                <p>{{ __('Home.slider_text_1') }}</p>
            </div>
        </div>
        <div class="carousel-inner custom-carousel-height">
            <div class="carousel-item active">
                <img src="{{ asset('img/banner/slider_1.jpg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.slider_heading_1') }}</h5>
                    <p>{{ __('Home.slider_text_1') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/slider_2.png') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.slider_heading_2') }}</h5>
                    <p>{{ __('Home.slider_text_2') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/banner/slider_3.jpg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.slider_heading_3') }}</h5>
                    <p>{{ __('Home.slider_text_3') }}</p>
                </div>
            </div>
        </div>
        
    </div>
    <div class="container py-5">
        <h2 class="section-title text-center mb-4">{{ __('Home.brands_title') }}</h2>
        <div class="row justify-content-center text-center brand-grid">
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Dog Chow']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/dog_chow.png') }}" alt="Dog Chow" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Evolve']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/evolve.png') }}" alt="Evolve" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Felix']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/felix.png') }}" alt="Felix" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Hills']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/hills.png') }}" alt="Hills" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Pedigree']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/pedigree.png') }}" alt="Pedigree" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Royal Canin']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/royal_canin.png') }}" alt="Royal Canin" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Taste of the Wild']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/taste_of_the_wild.png') }}" alt="Taste of the Wild" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
            <div class="col-6 col-md-2 mb-4">
                <a href="{{ route('product.filterByBrand', ['brand' => 'Whiskas']) }}" class="brand-link">
                    <img src="{{ asset('img/brands/whiskas.png') }}" alt="Whiskas" class="img-fluid brand-logo shadow-hover">
                </a>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators2" class="carousel slide custom-carousel-height" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner custom-carousel-height">
            <div class="carousel-item active">
                <img src="{{ asset('img/carousel/carousel_1.jpg') }}" class="d-block w-100" alt="Carousel 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.carousel_1_heading') }}</h5>
                    <p>{{ __('Home.carousel_1_text') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel/carousel_2.jpg') }}" class="d-block w-100" alt="Carousel 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.carousel_2_heading') }}</h5>
                    <p>{{ __('Home.carousel_2_text') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel/carousel_3.jpg') }}" class="d-block w-100" alt="Carousel 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.carousel_3_heading') }}</h5>
                    <p>{{ __('Home.carousel_3_text') }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel/carousel_4.jpg') }}" class="d-block w-100" alt="Carousel 4">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ __('Home.carousel_4_heading') }}</h5>
                    <p>{{ __('Home.carousel_4_text') }}</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="service_area py-3">
        <h2 class="section-title text-center mb-4">{{ __('Home.services_title') }}</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single_service">
                        <a href="{{ route('pet.index') }}" class="no-underline">
                            <img src="{{ asset('img/service/service_icon_1.png') }}" alt="Service Icon 1" class="service_icon">
                            <h3>{{ __('Home.service_1_title') }}</h3>
                            <p>{{ __('Home.service_1_description') }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single_service">
                        <a href="#carouselExampleIndicators" class="no-underline">
                            <img src="{{ asset('img/service/service_icon_2.png') }}" alt="Service Icon 2" class="service_icon">
                            <h3>{{ __('Home.service_2_title') }}</h3>
                            <p>{{ __('Home.service_2_description') }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single_service">
                        <a href="{{ route('pets.recommendations') }}" class="no-underline">
                            <img src="{{ asset('img/service/service_icon_3.png') }}" alt="Service Icon 3" class="service_icon">
                            <h3>{{ __('Home.service_3_title') }}</h3>
                            <p>{{ __('Home.service_3_description') }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
