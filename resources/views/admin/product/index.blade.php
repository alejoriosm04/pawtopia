{{-- Lina Ballesteros --}}
@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
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
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin/Product.name') }}:</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin/Product.price') }}:</label>
                            <input name="price" value="{{ old('price') }}" type="number" step="any" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.description') }}:</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.image') }}:</label>
                    <input class="form-control" type="file" name="image" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.storage_type') }}:</label>
                    <select name="storage_type" class="form-control" required>
                        <option value="gcp" {{ old('storage_type', 'gcp') == 'gcp' ? 'selected' : '' }}>
                            {{ __('admin/Product.cloud_storage') }}
                        </option>
                        <option value="local" {{ old('storage_type') == 'local' ? 'selected' : '' }}>
                            {{ __('admin/Product.local_storage') }}
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.species') }}:</label>
                    <select id="species-selector" name="species_id" class="form-control" required>
                        <option value="">{{ __('admin/Product.select_species') }}</option>
                        @foreach($viewData['species'] as $species)
                            <option value="{{ $species->getId() }}" {{ old('species_id') == $species->getId() ? 'selected' : '' }}>
                                {{ $species->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Product.category') }}:</label>
                    <select id="category-selector" name="category_id" class="form-control" required>
                        <option value="">{{ __('admin/Product.select_category') }}</option>
                        @foreach($viewData['categories'] as $category)
                            <option value="{{ $category->getId() }}" {{ old('category_id') == $category->getId() ? 'selected' : '' }}>
                                {{ $category->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('admin/Product.submit_button') }}</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            {{ __('admin/Product.manage_products') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{ __('admin/Product.id') }}</th>
                        <th>{{ __('admin/Product.name') }}</th>
                        <th>{{ __('admin/Product.price') }}</th>
                        <th>{{ __('admin/Product.category') }}</th>
                        <th>{{ __('admin/Product.species') }}</th>
                        <th>{{ __('admin/Product.edit') }}</th>
                        <th>{{ __('admin/Product.delete') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($viewData['products'] as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ $product->category->getName() }}</td>
                            <td>{{ $product->species->getName() }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}" class="btn btn-primary">
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
    </div>

    <script>
        var adminProductSelectCategory = "{{ __('admin/Product.select_category') }}";
        var categories = @json($viewData['categories']);
    </script>

    <script src="{{ asset('js/admin/product/species_category.js') }}"></script>
@endsection
