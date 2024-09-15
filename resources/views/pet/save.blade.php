@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container mt-4">
    <div class="alert alert-success" role="alert">
        {{ $viewData["message"] }}
    </div>
    <a href="{{ route('home.index') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection