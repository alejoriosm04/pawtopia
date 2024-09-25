@extends('layouts.app')

@section('title', __('Page Not Found'))

@section('content')
<div class="container text-center">
    <h1 class="display-1">404</h1>
    <p class="lead">{{ __('messages.page_not_found') }}</p>
    <a href="{{ route('home.index') }}" class="btn btn-primary">{{ __('messages.go_home') }}</a>
</div>
@endsection