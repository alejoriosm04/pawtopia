@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
    <div class="container">
        <h1>{{ __('Create User') }}</h1>
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="address">{{ __('Address') }}</label>
        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
    </div>
    <div class="form-group">
        <label for="credit_card">{{ __('Credit Card') }}</label>
        <input type="text" name="credit_card" class="form-control" value="{{ old('credit_card') }}">
    </div>
    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="image">{{ __('Profile Image') }}</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</form>
    </div>
@endsection
