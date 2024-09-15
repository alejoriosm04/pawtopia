@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Pet') }}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('pet.update', ['id' => $viewData['pet']->getId()]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Name -->
            <div class="form-group mb-2">
              <label for="name">{{ __('Enter name') }}</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $viewData['pet']->getName()) }}" required>
            </div>

            <!-- Image Upload -->
            <div class="form-group mb-2">
              <label for="image">{{ __('Pet Image') }}</label>
              <input type="file" class="form-control" id="image" name="image">
              <small>{{ __('Leave blank if you don\'t want to update the image') }}</small>
            </div>

            <!-- Species -->
            <div class="form-group mb-2">
              <label for="species">{{ __('Enter species') }}</label>
              <input type="text" class="form-control" id="species" name="species" value="{{ old('species', $viewData['pet']->getSpecie()) }}" required>
            </div>

            <!-- Breed -->
            <div class="form-group mb-2">
              <label for="breed">{{ __('Enter breed') }}</label>
              <input type="text" class="form-control" id="breed" name="breed" value="{{ old('breed', $viewData['pet']->getBreed()) }}" required>
            </div>

            <!-- Birth Date -->
            <div class="form-group mb-2">
              <label for="birthDate">{{ __('Enter birth date') }}</label>
              <input type="date" class="form-control" id="birthDate" name="birthDate" value="{{ old('birthDate', $viewData['pet']->getBirthDate()) }}" required>
            </div>

            <!-- Characteristics -->
            <div class="form-group mb-2">
              <label for="characteristics">{{ __('Select characteristics') }}</label>
              
              <!-- Color -->
              <div class="form-group mb-2">
                <label for="color">{{ __('Color') }}</label>
                <select class="form-control" id="color" name="characteristics[color]">
                  <option value="">{{ __('Select color') }}</option>
                  <option value="green" {{ old('characteristics.color', $viewData['pet']->getCharacteristics()['color']) == 'green' ? 'selected' : '' }}>{{ __('Green') }}</option>
                  <option value="brown" {{ old('characteristics.color', $viewData['pet']->getCharacteristics()['color']) == 'brown' ? 'selected' : '' }}>{{ __('Brown') }}</option>
                  <option value="black" {{ old('characteristics.color', $viewData['pet']->getCharacteristics()['color']) == 'black' ? 'selected' : '' }}>{{ __('Black') }}</option>
                  <option value="white" {{ old('characteristics.color', $viewData['pet']->getCharacteristics()['color']) == 'white' ? 'selected' : '' }}>{{ __('White') }}</option>
                </select>
              </div>

              <!-- Size -->
              <div class="form-group mb-2">
                <label for="size">{{ __('Size') }}</label>
                <select class="form-control" id="size" name="characteristics[size]">
                  <option value="">{{ __('Select size') }}</option>
                  <option value="Small" {{ old('characteristics.size', $viewData['pet']->getCharacteristics()['size']) == 'Small' ? 'selected' : '' }}>{{ __('Small') }}</option>
                  <option value="Medium" {{ old('characteristics.size', $viewData['pet']->getCharacteristics()['size']) == 'Medium' ? 'selected' : '' }}>{{ __('Medium') }}</option>
                  <option value="Large" {{ old('characteristics.size', $viewData['pet']->getCharacteristics()['size']) == 'Large' ? 'selected' : '' }}>{{ __('Large') }}</option>
                </select>
              </div>

              <!-- Temperament -->
              <div class="form-group mb-2">
                <label for="temperament">{{ __('Temperament') }}</label>
                <select class="form-control" id="temperament" name="characteristics[temperament]">
                  <option value="">{{ __('Select temperament') }}</option>
                  <option value="Friendly" {{ old('characteristics.temperament', $viewData['pet']->getCharacteristics()['temperament']) == 'Friendly' ? 'selected' : '' }}>{{ __('Friendly') }}</option>
                  <option value="Aggressive" {{ old('characteristics.temperament', $viewData['pet']->getCharacteristics()['temperament']) == 'Aggressive' ? 'selected' : '' }}>{{ __('Aggressive') }}</option>
                  <option value="Calm" {{ old('characteristics.temperament', $viewData['pet']->getCharacteristics()['temperament']) == 'Calm' ? 'selected' : '' }}>{{ __('Calm') }}</option>
                </select>
              </div>
            </div>

            <!-- Medications -->
            <div class="form-group mb-2">
              <label for="medications">{{ __('Enter medications') }}</label>
              <input type="text" class="form-control" id="medications" name="medications" value="{{ old('medications', $viewData['pet']->getMedications()) }}">
            </div>

            <!-- Feeding -->
            <div class="form-group mb-2">
              <label for="feeding">{{ __('Enter feeding') }}</label>
              <input type="text" class="form-control" id="feeding" name="feeding" value="{{ old('feeding', $viewData['pet']->getFeeding()) }}">
            </div>

            <!-- Veterinary Notes -->
            <div class="form-group mb-2">
              <label for="veterinaryNotes">{{ __('Enter veterinary notes') }}</label>
              <input type="text" class="form-control" id="veterinaryNotes" name="veterinaryNotes" value="{{ old('veterinaryNotes', $viewData['pet']->getVeterinaryNotes()) }}">
            </div>

            <!-- Submit Button -->
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="{{ __('Update') }}">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
