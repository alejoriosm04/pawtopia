@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    <h1>{{ __('PetFriendly.places_near_you') }}</h1>
    <br>
    <div id="map" style="height: 400px; width: 100%;"></div>

    <h2 class="mt-4">{{ __('PetFriendly.nearby_places') }}</h2>
    @if (count($viewData['places']) > 0)
        <ul class="list-group">
            @foreach ($viewData['places'] as $place)
                <li class="list-group-item">
                    <h5>{{ $place['name'] }}</h5>
                    <p>{{ $place['vicinity'] }}</p>
                    <p><strong>{{ __('PetFriendly.rating') }}:</strong> {{ $place['rating'] ?? 'N/A' }}</p>
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($place['name']) }}&query_place_id={{ $place['place_id'] }}" target="_blank" class="btn btn-custom btn-sm">{{ __('PetFriendly.view_on_map') }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>{{ __('PetFriendly.no_results') }}</p>
    @endif
</div>

<script>
    window.places = @json($viewData['places']);
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.places_api_key') }}&libraries=places"></script>
<script src="{{ asset('js/pet_friendly/map.js') }}"></script>
@endsection
