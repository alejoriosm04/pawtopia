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
            {{ __('admin/Category.create_category') }}
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin/Category.name') }}:</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('admin/Category.description') }}:</label>
                            <textarea class="form-control" name="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('admin/Category.submit_button') }}</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ __('admin/Category.manage_categories') }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">{{ __('admin/Category.id') }}</th>
                    <th scope="col">{{ __('admin/Category.name') }}</th>
                    <th scope="col">{{ __('admin/Category.edit') }}</th>
                    <th scope="col">{{ __('admin/Category.delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($viewData["categories"] as $category)
                    <tr>
                        <td>{{ $category->getId() }}</td>
                        <td>{{ $category->getName() }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.category.edit', ['id' => $category->getId()]) }}">
                                <i class="bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.category.delete', $category->getId()) }}" method="POST">
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
