{{-- Lina Ballesteros --}}
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
                            <span class="pull-right">(<strong>{{ count($viewData['products']) }}</strong>) {{ __('Cart.items') }}</span>
                            <h5>{{ __('Cart.items_in_cart') }}</h5>
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
                                                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="text-warning">
                                                        {{ $product->getName() }}
                                                    </a>
                                                </h3>

                                                <dl class="small m-b-none">
                                                    <dt>{{ __('Cart.description') }}</dt>
                                                    <dd>{{ $product->getDescription() }}</dd>
                                                </dl>

                                                <div class="m-t-sm">
                                                    <a href="#" class="text-muted"><i class="fa fa-gift"></i> {{ __('Cart.add_gift_package') }}</a>
                                                    |
                                                    <a href="{{ route('cart.remove', ['id' => $product->getId()]) }}" class="text-muted"><i class="fa fa-trash"></i> {{ __('Cart.remove_item') }}</a>
                                                </div>
                                            </td>

                                            <td>
                                                ${{ $product->getPrice() }}
                                            </td>
                                            <td width="80">
                                                <input type="number" class="form-control quantity-input" name="quantity" data-product-id="{{ $product->getId() }}" min="1" value="{{ session('products')[$product->getId()] }}">
                                            </td>
                                            <td>
                                                <h4 id="subtotal-{{ $product->getId() }}">
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
                            @if (count($viewData["products"]) > 0)
                                <form method="POST" action="{{ route('shoppingcart.purchase') }}">
                                    @csrf
                                    <label for="pet_id">{{ __('Cart.select_pet') }}:</label>
                                   <select name="pet_id" id="pet_id">
                                        @if ($viewData['pets']->isEmpty())
                                            <option value="">{{ __('Cart.no_pets_available') }}</option>
                                        @else
                                            @foreach ($viewData['pets'] as $pet)
                                                <option value="{{ $pet->getId() }}">{{ $pet->getName() }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <button type="submit" class="btn btn-checkout btn-lg">
                                        <i class="fa fa-shopping-cart"></i> {{ __('Cart.checkout') }}
                                    </button>
                                </form>
                                <a href="{{ route('product.index') }}" class="btn btn-white btn-lg" style="margin-right: 10px;"><i class="fa fa-arrow-left"></i> {{ __('Cart.continue_shopping') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 cart-summary-title">{{ __('Cart.summary') }}</h5>
                        </div>
                        <div class="card-body">
                            <span>{{ __('Cart.total') }}</span>
                            <h2 class="font-weight-bold small-text" id="cart-total">${{ $viewData['total'] }}</h2>
                            <hr>
                            <span class="text-muted small">{{ __('Cart.tax_info') }}</span>
                            <div class="m-t-sm">
                                <div class="btn-group d-flex flex-column">
                                    <br>
                                    @if (count($viewData["products"]) > 0)
                                        <a href="{{ route('shoppingcart.purchase') }}" class="btn btn-checkout btn-lg pull-right"><i class="fa fa-shopping-cart"></i> {{ __('Cart.checkout') }}</a>
                                        <a href="{{ route('product.index') }}" class="btn btn-white btn-sm">{{ __('Cart.cancel') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox mt-4">
                        <div class="ibox-title">
                            <h5>{{ __('Cart.support') }}</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h3 class="support-number"><i class="fa fa-phone"></i> +57 123456788</h3>
                            <span class="small">{{ __('Cart.support_info') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/shoppingcart.css') }}">
    <script src="{{ asset('js/shoppingcart/shoppingcart.js') }}"></script>
@endsection
