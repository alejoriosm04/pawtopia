<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Species;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PetController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Pet.pets_title');
        $viewData['subtitle'] = __('Pet.pets_subtitle');
        $viewData['pets'] = Pet::all();
        $viewData['species'] = Species::all();
        $viewData['species_categories'] = Species::with('categories')->get();

        return view('pet.index')->with('viewData', $viewData);
    }

    public function show(int $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $pet = Pet::findOrFail($id);
            $viewData['title'] = __('Pet.pet_info_title', ['name' => $pet->getName()]);
            $viewData['subtitle'] = __('Pet.pet_info_subtitle', ['name' => $pet->getName()]);
            $viewData['pet'] = $pet;
            $viewData['species'] = Species::all();
            $viewData['species_categories'] = Species::with('categories')->get();

            return view('pet.show')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pet.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('Pet.create_pet_title');
        $viewData['species'] = Species::all();
        $viewData['species_categories'] = Species::with('categories')->get();

        return view('pet.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        Pet::validate($request);

        $formattedDate = Carbon::createFromFormat('Y-m-d', $request->input('birthDate'))->format('Y-m-d');

        Pet::create([
            'name' => $request->input('name'),
            'image' => Pet::storeImage($request->file('image')),
            'species_id' => $request->input('species_id'),
            'breed' => $request->input('breed'),
            'birthDate' => $formattedDate,
            'characteristics' => json_encode($request->input('characteristics')),
            'medications' => $request->input('medications'),
            'feeding' => $request->input('feeding'),
            'veterinaryNotes' => $request->input('veterinaryNotes'),
            'user_id' => auth()->id(),
        ]);

        $viewData = [];
        $viewData['title'] = __('Pet.pet_created_title');
        $viewData['message'] = __('Pet.pet_created_message');
        $viewData['species_categories'] = Species::with('categories')->get();

        return view('pet.save')->with('viewData', $viewData);
    }

    public function edit(int $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $pet = Pet::findOrFail($id);
            $viewData['title'] = __('Pet.edit_pet_title', ['name' => $pet->getName()]);
            $viewData['pet'] = $pet;
            $viewData['species'] = Species::all();
            $viewData['species_categories'] = Species::with('categories')->get();

            return view('pet.edit')->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pet.index');
        }
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Pet::validate($request);
        $pet = Pet::findOrFail($id);

        $formattedDate = Carbon::createFromFormat('Y-m-d', $request->input('birthDate'))->format('Y-m-d');

        $pet->update([
            'name' => $request->input('name'),
            'species_id' => $request->input('species_id'),
            'breed' => $request->input('breed'),
            'birthDate' => $formattedDate,
            'characteristics' => json_encode($request->input('characteristics')),
            'medications' => $request->input('medications'),
            'feeding' => $request->input('feeding'),
            'veterinaryNotes' => $request->input('veterinaryNotes'),
        ]);

        return redirect()->route('pet.show', ['id' => $pet->getId()]);
    }

    public function delete(int $id): RedirectResponse
    {
        $pet = Pet::findOrFail($id);
        $pet->deleteImage();
        $pet->delete();

        return redirect()->route('pet.index');
    }
}
