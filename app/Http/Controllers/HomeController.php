<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Species;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['species_categories'] = Species::with('categories')->get();


        return view('home.index')->with('viewData', $viewData);
    }
}
