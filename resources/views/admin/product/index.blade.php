@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            {{ __('admin/Product.create_product') }}
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin/Product.name') }}:</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin/Product.price') }}:</label>
                            <input name="price" value="{{ old('price') }}" type="number" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.image') }}:</label>
                    <input class="form-control" type="file" name="image" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.description') }}</label>
                    <textarea class="form-control" name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('admin/Product.submit_button') }}</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ __('admin/Product.manage_products') }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">{{ __('admin/Product.id') }}</th>
                    <th scope="col">{{ __('admin/Product.name') }}</th>
                    <th scope="col">{{ __('admin/Product.edit') }}</th>
                    <th scope="col">{{ __('admin/Product.delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($viewData["products"] as $product)
                    <tr>
                        <td>{{ $product->getId() }}</td>
                        <td>{{ $product->getName() }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}">
                                <i class="bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.product.delete', $product->getId()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
