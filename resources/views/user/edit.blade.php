@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ __('User.edit_user_title') }}</h1>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('user.update', ['id' => $viewData['user']->getId()]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">{{ __('User.name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $viewData['user']->getName()) }}">
        </div>

        <div class="form-group">
            <label for="email">{{ __('User.email') }}</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $viewData['user']->getEmail()) }}">
        </div>

        <div class="form-group">
            <label for="address">{{ __('User.address') }}</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $viewData['user']->getAddress()) }}">
        </div>

        <div class="form-group">
            <label for="credit_card">{{ __('User.credit_card') }}</label>
            <input type="text" name="credit_card" class="form-control" value="{{ old('credit_card', $viewData['user']->getCreditCard()) }}">
        </div>

        <div class="form-group">
            <label for="image">{{ __('User.change_profile_image') }}</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Action.update_user') }}</button>
    </form>
</div>
@endsection
