{{-- Lina Ballesteros --}}
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    @forelse ($viewData["orders"] as $order)
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Order.order') }} #{{ $order->getId() }}
            </div>
            <div class="card-body">
                <b>{{ __('Order.date') }}:</b> {{ $order->getCreatedAt() }}<br />
                <b>{{ __('Order.total') }}:</b> ${{ $order->getTotal() }}<br />
                @if($order->pet)
                    <b>{{ __('Order.associated_pet') }}:</b> {{ $order->pet->getName() }}<br />
                @endif
                <table class="table table-bordered table-striped text-center mt-3 uniform-table">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('Order.item_id') }}</th>
                        <th scope="col">{{ __('Order.product_name') }}</th>
                        <th scope="col">{{ __('Order.price') }}</th>
                        <th scope="col">{{ __('Order.quantity') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->getItems() as $item)
                        <tr>
                            <td>{{ $item->getId() }}</td>
                            <td>
                                <a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
                                    {{ $item->getProduct()->getName() }}
                                </a>
                            </td>
                            <td>${{ $item->getPrice() }}</td>
                            <td>{{ $item->getQuantity() }}</td>
                        </tr>
                        @if($item->pet)
                            <tr>
                                <td colspan="4">
                                    <b>{{ __('Order.associated_pet') }}:</b>
                                    <span style="color: orange;">{{ $item->pet->getName() }}</span>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    @if($order->getTotal() > 100)
                        <b>{{ __('Order.coupon_code') }}:</b> {{ $order->coupon_code }}<br>
                        <b>{{ __('Order.external_product_link') }}:</b>
                        <a href="{{ $order->external_product_link }}" target="_blank">{{ __('Order.view_product') }}</a><br>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger" role="alert">
            {{ __('Order.no_purchases') }}
        </div>
    @endforelse
@endsection