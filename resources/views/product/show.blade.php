{{-- Lina Ballesteros --}}
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card mb-3 shadow-lg p-3 mb-5 bg-body rounded" style="max-width: 800px; margin: 0 auto;">
        <div class="row g-0">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded shadow-lg product-image" alt="{{ $viewData['product']->getName() }}">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h1 class="card-title display-6">
                        {{ $viewData["product"]->getName() }}
                    </h1>
                    <h4 class="text-warning mb-3">
                        ${{ number_format($viewData["product"]->getPrice(), 2) }}
                    </h4>
                    <p class="card-text lead">{{ $viewData["product"]->getDescription() }}</p>
                    <div class="mb-3">
                        <p class="card-text">
                            <small class="text-muted">
                                {{ __('Product.created_at') }}: {{ $viewData["product"]->created_at->format('Y-m-d H:i') }}
                            </small><br>
                            <small class="text-muted">
                                {{ __('Product.updated_at') }}: {{ $viewData["product"]->updated_at->format('Y-m-d H:i') }}
                            </small>
                        </p>
                    </div>
                    <form method="POST" action="{{ route('cart.add', ['id' => $viewData["product"]->getId()]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="quantity-{{ $viewData["product"]->getId() }}" class="form-label">{{ __('Product.quantity') }}</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity({{ $viewData['product']->getId() }})">-</button>
                                <input id="quantity-{{ $viewData["product"]->getId() }}" name="quantity" type="number" class="form-control text-center" value="1" min="1">
                                <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity({{ $viewData['product']->getId() }})">+</button>
                            </div>
                        </div>
                        <button class="btn btn-orange w-100 mt-3" type="submit">
                            <i class="bi bi-cart"></i> {{ __('Product.add_to_cart') }}
                        </button>
                    </form>
                    
                    <div class="mt-4">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> {{ __('Product.back_to_products') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/product/cart_quantity.js') }}"></script>
@endsection
