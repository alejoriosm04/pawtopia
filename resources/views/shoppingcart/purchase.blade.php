{{-- Lina Ballesteros --}}
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Order.purchase_completed') }}
        </div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                {{ __('Order.congratulations') }} {{ __('Order.order_number') }} <b>#{{ $viewData["order"]->getId() }}</b>
            </div>
        </div>
    </div>
@endsection
