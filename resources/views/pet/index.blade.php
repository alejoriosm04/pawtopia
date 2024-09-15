@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="d-flex justify-content-center mb-4">
  <a href="{{ route('pet.create') }}" class="btn btn-success btn-lg">{{ __('Pet.create_new_pet_button') }}</a>
</div>

<div class="row">
  @foreach ($viewData["pets"] as $pet)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <img src="{{ Storage::url($pet->getImage()) }}" alt="{{ $pet->getName() }}" class="img-fluid mb-2" style="max-height: 150px; object-fit: cover;">
        
        <a href="{{ route('pet.show', ['id'=> $pet->getId()]) }}" class="btn bg-primary text-white">
          {{ $pet->getId() }} - 
          <strong>{{ $pet->getName() }}</strong> ( {{ $pet->getbirthDate() }} )
          - {{ __($viewData["species"][$pet->getSpecies()]) }}
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
