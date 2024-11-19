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
        $latitude = $request->input('lat');
        $longitude = $request->input('lng');
        
        $places = [];

        if ($latitude && $longitude) {
            $places = $this->googlePlaces->searchPetFriendlyPlaces($latitude, $longitude);
        }

        $viewData = [];
        $viewData['title'] = __('PetFriendly.pet_friendly_title');
        $viewData['subtitle'] = __('PetFriendly.pet_friendly_subtitle');
        // $viewData['breadcrumbs'] = Breadcrumbs::render('pet_friendly.index');
        $viewData['latitude'] = $latitude;
        $viewData['longitude'] = $longitude;
        $viewData['places'] = $places;

        return view('pet_friendly.index')->with('viewData', $viewData);
    }
}
