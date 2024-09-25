<?php

// Lina Ballesteros

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminSpeciesController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Species.index_title');
        $viewData['species'] = Species::all();

        return view('admin.species.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Species::validate($request);

        Species::create($request->only(['name', 'description']));

        return redirect()->route('admin.species.index')->with('success', __('admin/Species.create_success'));
    }

    public function delete(int $id): RedirectResponse
    {
        Species::destroy($id);

        return redirect()->route('admin.species.index')->with('success', __('admin/Species.delete_success'));
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Species.edit_title');
        $viewData['species'] = Species::findOrFail($id);

        return view('admin.species.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Species::validate($request);

        $species = Species::findOrFail($id);
        $species->update($request->only(['name', 'description']));

        return redirect()->route('admin.species.index')->with('success', __('admin/Species.update_success'));
    }
}
