@extends('layouts.app')

@section('title', __('Page Not Found'))

@section('content')
<div class="container text-center">
    <h1 class="display-1">404</h1>
    <p class="lead">{{ __('Sorry, the page you are looking for could not be found.') }}</p>
    <a href="{{ url('/') }}" class="btn btn-primary">{{ __('Go Home') }}</a>
</div>
@endsection