<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Category.index_title');
        $viewData['categories'] = Category::all();

        return view('admin.category.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        Category::create($request->only(['name', 'description']));

        return redirect()->route('admin.category.index')->with('success', __('admin/Category.create_success'));
    }

    public function delete($id): RedirectResponse
    {
        Category::destroy($id);

        return redirect()->route('admin.category.index')->with('success', __('admin/Category.delete_success'));
    }

    public function edit($id): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Category.edit_title');
        $viewData['category'] = Category::findOrFail($id);

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only(['name', 'description']));

        return redirect()->route('admin.category.index')->with('success', __('admin/Category.update_success'));
    }
}
