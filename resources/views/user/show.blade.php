@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'] ?? '')

@section('content')
<div class="card mb-4">
    <div class="row g-0">
        <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
            <img src="{{ $viewData['user']->getImage() }}" class="img-fluid rounded-start" alt="{{ __('User.image_alt') }}" style="max-width: 100%; height: auto;">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title">{{ __('User.welcome') }} {{ $viewData['user']->getName() }}</h3>
                <p class="card-text"><strong>{{ __('User.email') }}:</strong> {{ $viewData['user']->getEmail() }}</p>
                <p class="card-text"><strong>{{ __('User.address') }}:</strong> {{ $viewData['user']->getAddress() }}</p>

                <div class="mt-4">
                    <h5>{{ __('User.pets') }}</h5>
                    @if (count($viewData['user']->getPets()) > 0)
                        <div class="row">
                            @foreach($viewData['user']->getPets() as $pet)
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        <a href="{{ route('pet.show', ['id' => $pet->getId()]) }}">
                                            <img src="{{ $pet->getImage() }}" class="card-img-top" alt="{{ $pet->getName() }} {{ __('User.pet_image') }}">
                                        </a>
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="{{ route('pet.show', ['id' => $pet->getId()]) }}" class="text-decoration-none">
                                                    {{ $pet->getName() }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>{{ __('User.no_pets') }}</p>
                    @endif
                </div>

            <h5>{{ __('User.fav_products') }}</h5>
            @if (count($viewData['user']->getFavList()) > 0)
                <ul>
                    @foreach($viewData['user']->getFavList() as $product)
                        <li>
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="custom-favorite-link">
                                {{ $product->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>{{ __('User.no_fav_products') }}</p>
            @endif

                <div class="mt-4">
                    <h5>{{ __('User.orders') }}</h5>
                    @if (count($viewData['user']->getOrders()) > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($viewData['user']->getOrders() as $order)
                                <li class="list-group-item">
                                    <a href="{{ route('user.orders') }}" class="text-decoration-none">
                                        {{ __('User.order_number') }} <strong>#{{ $order->getId() }}</strong> - {{ __('User.order_date') }} {{ $order->getCreatedAt() }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>{{ __('User.no_orders') }}</p>
                    @endif
                </div>

                <div class="mt-4">
                    <a href="{{ route('user.edit', ['id' => $viewData['user']->getId()]) }}" class="btn btn-primary">
                        {{ __('Action.edit_profile') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
