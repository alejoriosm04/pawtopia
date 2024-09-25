{{-- Lina Ballesteros --}}
@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('admin/Home.header') }}
        </div>
        <div class="card-body">
            {{ __('admin/Home.welcome_message') }}
        </div>
    </div>
@endsection
