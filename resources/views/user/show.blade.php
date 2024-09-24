@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ __('Detalles del Usuario') }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $viewData['user']->getName() }}</h5>
            <p class="card-text"><strong>{{ __('Email:') }}</strong> {{ $viewData['user']->getEmail() }}</p>
            <p class="card-text"><strong>{{ __('Dirección:') }}</strong> {{ $viewData['user']->getAddress() }}</p>
            <p class="card-text"><strong>{{ __('Tarjeta de crédito:') }}</strong> {{ $viewData['user']->getCreditCard() }}</p>
            <p class="card-text"><strong>{{ __('Contraseña (sin cifrar):') }}</strong> {{ $viewData['user']->password }}</p>
            <p class="card-text"><strong>{{ __('Creado el:') }}</strong> {{ $viewData['user']->getCreatedAt() }}</p>
            <p class="card-text"><strong>{{ __('Actualizado el:') }}</strong> {{ $viewData['user']->getUpdatedAt() }}</p>
            
 
            <div class="mb-3">
                <strong>{{ __('Imagen del Usuario:') }}</strong><br>
                <img src="{{ asset('/storage/'.$viewData['user']->getImage()) }}" alt="User Image" class="img-fluid" style="max-width: 150px;">
            </div>
        </div>
    </div>
</div>
@endsection
