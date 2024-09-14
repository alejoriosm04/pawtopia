<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Pet;

class PetController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = __('Pet.pets_title');
        $viewData["subtitle"] = __('Pet.pets_subtitle');
        $viewData["pets"] = Pet::all();
        return view('pet.index')->with("viewData", $viewData);
    }
}
