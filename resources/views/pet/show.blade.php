@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <!-- Displaying the pet image from Laravel Storage using the getter -->
      <img src="{{ Storage::url($viewData['pet']->getImage()) }}" class="img-fluid rounded-start" alt="Pet Image">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <!-- Displaying the pet name using the getter -->
        <h3 class="card-title">{{ $viewData['pet']->getName() }}</h3>

        <!-- Displaying the pet species and breed using getters -->
        <p class="card-text"><strong>{{ __('Species') }}:</strong> {{ $viewData['pet']->getSpecie() }}</p>
        <p class="card-text"><strong>{{ __('Breed') }}:</strong> {{ $viewData['pet']->getBreed() }}</p>

        <!-- Displaying the pet birth date using the getter -->
        <p class="card-text"><strong>{{ __('Birth Date') }}:</strong> {{ $viewData['pet']->getBirthDate() }}</p>

        <!-- Displaying the pet characteristics using the getter -->
        <p class="card-text"><strong>{{ __('Characteristics') }}:</strong> 
        {{ implode(', ', $viewData['pet']->getCharacteristics()) }}
        </p>

        <!-- Displaying medications using the getter -->
        <p class="card-text"><strong>{{ __('Medications') }}:</strong> {{ $viewData['pet']->getMedications() }}</p>

        <!-- Displaying feeding information using the getter -->
        <p class="card-text"><strong>{{ __('Feeding') }}:</strong> {{ $viewData['pet']->getFeeding() }}</p>

        <!-- Displaying veterinary notes using the getter -->
        <p class="card-text"><strong>{{ __('Veterinary Notes') }}:</strong> {{ $viewData['pet']->getVeterinaryNotes() }}</p>

        <!-- Edit button -->
        <a href="{{ route('pet.edit', ['id' => $viewData['pet']->getId()]) }}" class="btn btn-warning">{{ __('Edit') }}</a>

        <!-- Delete form and button -->
        <form action="{{ route('pet.delete', ['id' => $viewData['pet']->getId()]) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete this pet?') }}');">{{ __('Delete') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
