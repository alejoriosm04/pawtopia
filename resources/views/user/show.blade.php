@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')
<div class="container">
    <h1>{{ __('User.user_details_title') }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $viewData['user']->getName() }}</h5>
            <p class="card-text"><strong>{{ __('User.email') }}:</strong> {{ $viewData['user']->getEmail() }}</p>
            <p class="card-text"><strong>{{ __('User.address') }}:</strong> {{ $viewData['user']->getAddress() }}</p>

            <div class="mb-3">
                <strong>{{ __('User.profile_image') }}:</strong><br>
                <img src="{{ asset('/storage/'.$viewData['user']->getImage()) }}" alt="{{ __('User.image_alt') }}" class="img-fluid" style="max-width: 150px;">
            </div>

            <h5>{{ __('User.pets') }}</h5>
            @if (count($viewData['user']->pets) > 0)
                <ul>
                    @foreach($viewData['user']->pets as $pet)
                        <li>
                            <strong>{{ $pet->name }}</strong><br>
                            <img src="{{ asset('/storage/'.$pet->image) }}" alt="{{ $pet->name }} {{ __('User.pet_image') }}" class="img-fluid" style="max-width: 150px;">
                        </li>
                    @endforeach
                </ul>
            @else
                <p>{{ __('User.no_pets') }}</p>
            @endif

            <h5>{{ __('User.fav_products') }}</h5>
            @if (count($viewData['user']->favList) > 0)
                <ul>
                    @foreach($viewData['user']->favList as $product)
                        <li>{{ $product->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>{{ __('User.no_fav_products') }}</p>
            @endif

            <h5>{{ __('User.orders') }}</h5>
            @if (count($viewData['user']->orders) > 0)
                <ul>
                    @foreach($viewData['user']->orders as $order)
                        <li>{{ __('User.order_number') }} {{ $order->id }} - {{ __('User.order_date') }} {{ $order->created_at }}</li>
                    @endforeach
                </ul>
            @else
                <p>{{ __('User.no_orders') }}</p>
            @endif
        </div>
    </div>
    <a href="{{ route('user.edit', ['id' => $viewData['user']->getId()]) }}" class="btn btn-primary">{{ __('Action.edit_profile') }}</a>
</div>
@endsection
