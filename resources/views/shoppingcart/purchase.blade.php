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
            @if($viewData["order"]->getTotal() > 100)
                <div class="alert alert-info" role="alert">
                    🎁 {{ __('Order.gift_notification') }}
                </div>
            @endif
        </div>
    </div>
@endsection
