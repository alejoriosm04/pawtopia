<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Pet;
use Exception;

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

    public function show(string $id): View | RedirectResponse
    {
        try {
            $viewData = [];
            $pet = Pet::findOrFail($id);
            $viewData["title"] = __('Pet.pet_info_title', ['name' => $pet->getName()]);
            $viewData["subtitle"] = __('Pet.pet_info_subtitle', ['name' => $pet->getName()]);
            $viewData["pet"] = $pet;
            return view('pet.show')->with("viewData", $viewData);
        } catch (Exception $e) {
            return redirect()->route('pet.index');
        }
    }
}
