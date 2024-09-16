@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <span class="pull-right">(<strong>{{ count($viewData['products']) }}</strong>) items</span>
                        <h5>{{ __('Items in your cart') }}</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table shoping-cart-table">
                                <tbody>
                                @foreach ($viewData['products'] as $product)
                                <tr>
                                    <td width="90">
                                        <div class="cart-product-imitation">
                                            <img src="{{ asset('/storage/'.$product->getImage()) }}" class="img-fluid">
                                        </div>
                                    </td>
                                    <td class="desc">
                                        <h3>
                                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="text-navy">
                                                {{ $product->getName() }}
                                            </a>
                                        </h3>

                                        <dl class="small m-b-none">
                                            <dt>{{ __('Description') }}</dt>
                                            <dd>{{ $product->getDescription() }}</dd>
                                        </dl>

                                        <div class="m-t-sm">
                                            <a href="#" class="text-muted"><i class="fa fa-gift"></i> {{ __('Add gift package') }}</a>
                                            |
                                            <a href="{{ route('cart.remove', ['id' => $product->getId()]) }}" class="text-muted"><i class="fa fa-trash"></i> {{ __('Remove item') }}</a>
                                        </div>
                                    </td>

                                    <td>
                                        ${{ $product->getPrice() }}
                                    </td>
                                    <td width="80">
                                        <input type="number" class="form-control quantity-input" name="quantity" data-product-id="{{ $product->getId() }}" min="1" value="{{ session('products')[$product->getId()] }}">
                                    </td>
                                    <td>
                                        <h4>
                                            ${{ $product->getPrice() * session('products')[$product->getId()] }}
                                        </h4>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <button class="btn btn-primary pull-right"><i class="fa fa-shopping-cart"></i> {{ __('Checkout') }}</button>
                        <a href="{{ route('product.index') }}" class="btn btn-white"><i class="fa fa-arrow-left"></i> {{ __('Continue shopping') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>{{ __('Cart Summary') }}</h5>
                    </div>
                    <div class="ibox-content">
                        <span>
                            {{ __('Total') }}
                        </span>
                        <h2 class="font-bold">
                            ${{ $viewData['total'] }}
                        </h2>

                        <hr>
                        <span class="text-muted small">
                            * {{ __('For Colombia applicable sales tax will be applied') }}
                        </span>
                        <div class="m-t-sm">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> {{ __('Checkout') }}</a>
                                <a href="#" class="btn btn-white btn-sm">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>{{ __('Support') }}</h5>
                    </div>
                    <div class="ibox-content text-center">
                        <h3><i class="fa fa-phone"></i> +57 123456788</h3>
                        <span class="small">
                            {{ __('Please contact with us if you have any questions. We are available 24h.') }}
                        </span>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/shoppingcart.js') }}"></script>

@endsection
