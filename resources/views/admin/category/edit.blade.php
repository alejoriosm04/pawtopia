@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('admin/Category.edit_category') }}
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.category.update', ['id'=> $viewData['category']->getId()]) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin/Category.name') }}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $viewData['category']->getName() }}" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Category.description') }}</label>
                    <textarea class="form-control" name="description" rows="3" required>{{ $viewData['category']->getDescription() }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin/Category.edit_button') }}</button>
            </form>
        </div>
    </div>
@endsection
