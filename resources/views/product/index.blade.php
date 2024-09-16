@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top">
                <div class="card-body text-center">
                    <h5>{{ $product->getName() }}</h5> <!-- Mostrar solo el nombre sin ID -->
                    <form method="POST" action="{{ route('cart.add', ['id'=> $product->getId()]) }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="number" name="quantity" value="1" class="form-control" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">{{ __('Add to Cart') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
