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
        <h5 class="card-title">{{ $viewData['pet']->getName() }}</h5>

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
        
      </div>
    </div>
  </div>
</div>
@endsection