@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card mb-3 shadow-sm">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start" alt="{{ $viewData['product']->getName() }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $viewData["product"]->getName() }}
                        <span class="text-muted">(${{ number_format($viewData["product"]->getPrice(), 2) }})</span>
                    </h3>
                    <p class="card-text mt-3">{{ $viewData["product"]->getDescription() }}</p>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> {{ __('Product.back_to_products') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
