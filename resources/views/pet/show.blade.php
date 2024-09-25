@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4 d-flex align-items-center justify-content-center">
      <img src="{{ Storage::url($viewData['pet']->getImage()) }}" class="img-fluid rounded-start" alt="Pet Image" style="max-width: 100%; height: auto;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">{{ $viewData['pet']->getName() }}</h3>

        <p class="card-text"><strong>{{ __('Pet.species') }}:</strong> {{ $viewData['pet']->species->getName() }}</p>
        <p class="card-text"><strong>{{ __('Pet.breed') }}:</strong> {{ $viewData['pet']->getBreed() }}</p>
        <p class="card-text"><strong>{{ __('Pet.birth_date') }}:</strong> {{ $viewData['pet']->getBirthDate() }}</p>
        <p class="card-text"><strong>{{ __('Pet.characteristics') }}:</strong>
          {{ implode(', ', $viewData['pet']->getCharacteristics()) }}
        </p>
        <p class="card-text"><strong>{{ __('Pet.medications') }}:</strong> {{ $viewData['pet']->getMedications() }}</p>
        <p class="card-text"><strong>{{ __('Pet.feeding') }}:</strong> {{ $viewData['pet']->getFeeding() }}</p>
        <p class="card-text"><strong>{{ __('Pet.veterinary_notes') }}:</strong> {{ $viewData['pet']->getVeterinaryNotes() }}</p>
        <div class="d-flex justify-content-start">
          <a href="{{ route('pet.edit', ['id' => $viewData['pet']->getId()]) }}" class="btn btn-warning btn-sm me-2">{{ __('Pet.edit') }}</a>

          <form action="{{ route('pet.delete', ['id' => $viewData['pet']->getId()]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Pet.alert') }}');">{{ __('Pet.delete') }}</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
