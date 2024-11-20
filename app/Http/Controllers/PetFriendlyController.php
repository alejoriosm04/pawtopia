<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\GooglePlacesService;
// use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class PetFriendlyController extends Controller
{
    protected $googlePlaces;

    public function __construct(GooglePlacesService $googlePlaces)
    {
        parent::__construct();
        $this->googlePlaces = $googlePlaces;
    }

    public function index(Request $request): View
    {
        $defaultLatitude = 40.7128;
        $defaultLongitude = -74.0060;

        $latitude = $request->input('lat', $defaultLatitude);
        $longitude = $request->input('lng', $defaultLongitude);

        $places = $this->googlePlaces->searchPetFriendlyPlaces($latitude, $longitude);

        $viewData = [];
        $viewData['title'] = __('PetFriendly.pet_friendly_title');
        $viewData['subtitle'] = __('PetFriendly.pet_friendly_subtitle');
        $viewData['latitude'] = $latitude;
        $viewData['longitude'] = $longitude;
        $viewData['places'] = $places;

        return view('pet_friendly.index')->with('viewData', $viewData);
    }
}
