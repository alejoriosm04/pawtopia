@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm h-100 product-card">
                <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top p-3 product-img">
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: #DB4D20;">{{ $product->getName() }}</h5>
                    <p class="card-text">
                        {{ $product->getDescription() }}
                    </p>
                    <p class="mb-2">
                        <span class="text-decoration-underline fw-bold">${{ number_format($product->getPrice(), 0, ',', '.') }}</span>
                    </p>
                    <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn btn-dark text-white">
                        {{ __('product.buy') }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
