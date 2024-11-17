@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container">
    <h2>{{ $viewData['title'] }}</h2>

    <div class="row">
        @foreach($viewData['products'] as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ $product->getImage() }}" class="card-img-top" alt="{{ $product->getName() }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->getName() }}</h5>
                        <p class="card-text">{{ $product->getDescription() }}</p>
                        <a href="{{ route('product.show', $product->getId()) }}" class="btn btn-primary">Ver Producto</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
