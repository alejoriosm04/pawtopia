@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'] ?? '')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('User.edit_user_title') }}
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <ul id="errors" class="alert alert-danger list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('user.update', ['id' => $viewData['user']->getId()]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Nombre del Usuario -->
                        <div class="form-group mb-3">
                            <label for="name">{{ __('User.name') }}</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $viewData['user']->getName()) }}" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email">{{ __('User.email') }}</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $viewData['user']->getEmail()) }}" required>
                        </div>
                        
                        <!-- Dirección -->
                        <div class="form-group mb-3">
                            <label for="address">{{ __('User.address') }}</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $viewData['user']->getAddress()) }}" required>
                        </div>
                        
                        <!-- Tarjeta de Crédito -->
                        <div class="form-group mb-3">
                            <label for="credit_card">{{ __('User.credit_card') }}</label>
                            <input type="text" name="credit_card" class="form-control" id="credit_card" value="{{ old('credit_card', $viewData['user']->getCreditCard()) }}" required>
                        </div>
                        
                        <!-- Imagen de Perfil -->
                        <div class="form-group mb-3">
                            <label for="image">{{ __('User.change_profile_image') }}</label>
                            <input type="file" name="image" class="form-control-file" id="image" onchange="previewImage(event)">
                            @if($viewData['user']->getImage())
                                <input type="hidden" name="current_image" value="{{ $viewData['user']->getImage() }}">
                                <small class="form-text text-muted">{{ __('User.current_image') }}</small>
                                <div class="mt-2">
                                    <img id="imagePreview" src="{{ asset($viewData['user']->getImage()) }}" alt="{{ __('User.image_alt') }}" class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            @else
                                <div class="mt-2">
                                    <img id="imagePreview" src="#" alt="{{ __('User.image_preview_alt') }}" class="img-fluid rounded" style="max-height: 150px; display: none;">
                                </div>
                            @endif
                        </div>
                        
                        <!-- Botón de Envío -->
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Action.update_user') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script para Previsualizar Imagen -->
<script>
    function previewImage(event) {
        const image = document.getElementById('imagePreview');
        if(event.target.files.length > 0){
            image.src = URL.createObjectURL(event.target.files[0]);
            image.style.display = 'block';
        } else {
            image.src = '#';
            image.style.display = 'none';
        }
    }
</script>
@endsection
