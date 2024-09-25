<?php
// Lina Ballesteros
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Category.index_title');
        $viewData['species'] = Species::all();
        $viewData['categoriesBySpecies'] = $this->getCategoriesBySpecies($request);

        return view('admin.category.index')->with('viewData', $viewData);
    }

    private function getCategoriesBySpecies(Request $request): array
    {
        $categoriesQuery = Category::query();

        if ($request->has('filter_species') && $request->input('filter_species')) {
            $categoriesQuery->where('species_id', $request->input('filter_species'));
        }

        $categoriesGrouped = $categoriesQuery->get()->groupBy('species_id');

        $categoriesWithSpecies = [];
        foreach ($categoriesGrouped as $speciesId => $categories) {
            $species = Species::find($speciesId);
            $categoriesWithSpecies[$species->getName()] = $categories;
        }

        return $categoriesWithSpecies;
    }

    public function store(Request $request): RedirectResponse
    {
        Category::validate($request);

        Category::create($request->only(['name', 'description', 'species_id']));

        return redirect()->route('admin.category.index')->with('success', __('admin/Category.create_success'));
    }

    public function delete(int $id): RedirectResponse
    {
        Category::destroy($id);

        return redirect()->route('admin.category.index')->with('success', __('admin/Category.delete_success'));
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Category.edit_title');
        $viewData['category'] = Category::findOrFail($id);
        $viewData['species'] = Species::all();

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Category::validate($request);

        $category = Category::findOrFail($id);
        $category->update($request->only(['name', 'description', 'species_id']));

        return redirect()->route('admin.category.index')->with('success', __('admin/Category.update_success'));
    }
}
