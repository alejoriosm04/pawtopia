@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ __('User.user_list_title') }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">{{ __('Action.create_user') }}</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('User.id') }}</th>
                <th>{{ __('User.image') }}</th>
                <th>{{ __('User.name') }}</th>
                <th>{{ __('User.email') }}</th>
                <th>{{ __('Action.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewData['users'] as $user)
            <tr>
                <td>{{ $user->getId() }}</td>
                <td>
                    <img src="{{ asset('storage/'.$user->getImage()) }}" alt="{{ __('User.image_alt') }}" width="50" height="50">
                </td>
                <td>{{ $user->getName() }}</td>
                <td>{{ $user->getEmail() }}</td>
                <td>
                    <a href="{{ route('user.show', ['id' => $user->getId()]) }}" class="btn btn-info">{{ __('Action.view') }}</a>
                    <a href="{{ route('user.edit', ['id' => $user->getId()]) }}" class="btn btn-warning">{{ __('Action.edit') }}</a>
                    <form action="{{ route('user.destroy', ['id' => $user->getId()]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Action.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
