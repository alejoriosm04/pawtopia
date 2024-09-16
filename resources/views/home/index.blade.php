@extends('layouts.app')
@section('title', __('Home.title'))

@section('content')

<!-- Slider Area con Bootstrap Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Services Section -->
<div class="service_area py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single_service">
                    <img src="{{ asset('img/service/service_icon_1.png') }}" alt="Service Icon 1" class="service_icon">
                    <h3>{{ __('Home.service_1_title') }}</h3>
                    <p>{{ __('Home.service_1_description') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single_service">
                    <img src="{{ asset('img/service/service_icon_2.png') }}" alt="Service Icon 2" class="service_icon">
                    <h3>{{ __('Home.service_2_title') }}</h3>
                    <p>{{ __('Home.service_2_description') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single_service">
                    <img src="{{ asset('img/service/service_icon_3.png') }}" alt="Service Icon 3" class="service_icon">
                    <h3>{{ __('Home.service_3_title') }}</h3>
                    <p>{{ __('Home.service_3_description') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
