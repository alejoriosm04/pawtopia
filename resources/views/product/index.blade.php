{{-- Lina Ballesteros --}}
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-3 col-lg-2 mb-2">
            <div class="card product-card h-100 d-flex flex-column">
                <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top">
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
                </div>
            </div>
        </div>
    @endforeach
</div>
    <script src="{{ asset('js/product/cart_quantity.js') }}"></script>
@endsection
