@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ __('Editar Usuario') }}</h1>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('user.update', ['id' => $viewData['user']->getId()]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __('Nombre') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $viewData['user']->getName()) }}">
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $viewData['user']->getEmail()) }}">
        </div>
        <div class="form-group">
            <label for="address">{{ __('Dirección') }}</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $viewData['user']->getAddress()) }}">
        </div>
        <div class="form-group">
            <label for="credit_card">{{ __('Tarjeta de Crédito') }}</label>
            <input type="text" name="credit_card" class="form-control" value="{{ old('credit_card', $viewData['user']->getCreditCard()) }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Actualizar Usuario') }}</button>
    </form>
</div>
@endsection
