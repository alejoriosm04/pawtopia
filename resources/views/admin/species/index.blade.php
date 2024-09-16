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
            {{ __('admin/Species.create_species') }}
        </div>
        <div class="card-body">
            @if($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.species.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('admin/Species.name') }}:</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin/Species.submit_button') }}</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ __('admin/Species.manage_species') }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th scope="col">{{ __('admin/Species.id') }}</th>
                    <th scope="col">{{ __('admin/Species.name') }}</th>
                    <th scope="col">{{ __('admin/Species.edit') }}</th>
                    <th scope="col">{{ __('admin/Species.delete') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($viewData["species"] as $species)
                    <tr>
                        <td>{{ $species->getId() }}</td>
                        <td>{{ $species->getName() }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.species.edit', ['id' => $species->getId()]) }}">
                                <i class="bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.species.delete', $species->getId()) }}" method="POST">
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
