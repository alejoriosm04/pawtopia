@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ __('Lista de Usuarios') }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">{{ __('Crear Usuario') }}</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Imagen') }}</th> 
                <th>{{ __('Nombre') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['users'] as $user)
            <tr>
                <td>{{ $user->getId() }}</td>
                <td>
                    
                    <img src="{{ asset('storage/'.$user->getImage()) }}" alt="Imagen del Usuario" width="50" height="50">
                </td>
                <td>{{ $user->getName() }}</td>
                <td>{{ $user->getEmail() }}</td>
                <td>
                    <a href="{{ route('user.show', ['id' => $user->getId()]) }}" class="btn btn-info">{{ __('Ver') }}</a>
                    <a href="{{ route('user.edit', ['id' => $user->getId()]) }}" class="btn btn-warning">{{ __('Editar') }}</a>
                    <form action="{{ route('user.destroy', ['id' => $user->getId()]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
