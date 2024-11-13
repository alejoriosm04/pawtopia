{{-- Lina Ballesteros --}}
@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="category-title-container text-center mb-5">
            <h2 class="category-title">{{ $viewData['title'] }}</h2>
        </div>
        <div class="species-indicator text-center mb-4">
            <p class="species-indicator-text">
                {{ __('Product.products_associated_message') }}
                <span class="species-name">{{ $viewData['brand'] }}</span>
            </p>
        </div>
        @if(count($viewData['products']) === 0)
            <div class="alert alert-warning text-center">
                {{ __('Product.no_products') }}
            </div>
        @else
            <div class="row">
                @foreach($viewData['products'] as $product)
                    <div class="col-md-3 col-lg-2 mb-2">
                        <div class="card product-card h-100 d-flex flex-column">
                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                                <img src=" {{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
                            </a>
                            <div class="card-body text-center flex-grow-1">
                                <h5>{{ $product->getName() }}</h5>
                                <p>
                                    <span class="text-warning fw-bold">${{ $product->getPrice() }}</span>
                                </p>

                                <form method="POST" action="{{ route('cart.add', ['id'=> $product->getId()]) }}">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity({{ $product->getId() }})">-</button>
                                            <input id="quantity-{{ $product->getId() }}" name="quantity" type="number" class="form-control text-center" value="1" min="1">
                                            <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity({{ $product->getId() }})">+</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-orange w-100 mt-auto" type="submit">{{ __('Product.add_to_cart') }}</button>
                                </form>

                                <form method="POST" action="{{ route('favorites.add', ['id' => $product->getId()]) }}" class="mt-3">
                                    @csrf
                                    <button class="btn btn-outline-danger w-100" type="submit">
                                        <i class="bi bi-heart"></i> {{ __('Messages.add_to_favorites') }}
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="{{ asset('js/product/cart_quantity.js') }}"></script>
@endsection
