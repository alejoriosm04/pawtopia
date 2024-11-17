<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Species;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $storageType = $request->input('storage_type', 'local');
        $imageStorage = app()->makeWith(ImageStorage::class, ['storage' => $storageType]);

        $imageUrl = $request->hasFile('image')
            ? $imageStorage->store($request, 'pets')
            : 'img/default_image.png';

        Pet::create([
            'name' => $request->input('name'),
            'image' => $imageUrl,
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

        $updateData = [
            'name' => $request->input('name'),
            'species_id' => $request->input('species_id'),
            'breed' => $request->input('breed'),
            'birthDate' => $formattedDate,
            'characteristics' => json_encode($request->input('characteristics')),
            'medications' => $request->input('medications'),
            'feeding' => $request->input('feeding'),
            'veterinaryNotes' => $request->input('veterinaryNotes'),
        ];

        $storageType = $request->input('storage_type', 'local');
        $imageStorage = app()->makeWith(ImageStorage::class, ['storage' => $storageType]);

        if ($request->hasFile('image')) {
            if ($pet->getImage() !== 'img/default_image.png') {
                $previousImagePath = str_replace(url('storage').'/', '', $pet->getImage());
                $imageStorage->delete($previousImagePath);
            }

            $updateData['image'] = $imageStorage->store($request, 'pets');
        }

        $pet->update($updateData);

        return redirect()->route('pet.show', ['id' => $pet->getId()])
            ->with('success', __('Pet.update_success'));
    }

    public function delete(int $id): RedirectResponse
    {
        Pet::destroy($id);

        return redirect()->route('pet.index');
    }

    public function getRecommendations(): View
    {
        $pets = Auth::user()->pets;
        $speciesIds = $pets->pluck('species_id');

        $recommendedProducts = Product::whereIn('species_id', $speciesIds)->with('category')->get();

        $categoryIds = $recommendedProducts->pluck('category_id');
        $additionalRecommendedProducts = Product::whereIn('category_id', $categoryIds)
            ->whereNotIn('species_id', $speciesIds)
            ->get();

        $finalRecommendedProducts = $recommendedProducts->merge($additionalRecommendedProducts);

        $viewData = [];
        $viewData['title'] = __('Pet.recommendations_title');
        $viewData['subtitle'] = __('Pet.recommendations_subtitle');
        $viewData['products'] = $finalRecommendedProducts;

        return view('pet.recommendations')->with('viewData', $viewData);
    }
}
