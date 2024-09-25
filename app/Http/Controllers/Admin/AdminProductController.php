<?php
// Lina Ballesteros
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Species;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Product.index_title');
        $viewData['products'] = Product::all();
        $viewData['species'] = Species::all();
        $viewData['categories'] = Category::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Product.create_title');
        $viewData['species'] = Species::all();
        $viewData['categories'] = Category::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::validate($request);

        $creationData = $request->only(['name', 'description', 'category_id', 'species_id']);

        $newProduct = new Product($creationData);

        $newProduct->setPrice($request->input('price'));

        if (! $request->hasFile('image')) {
            $newProduct->image = 'img/default_image.png';
        }

        $newProduct->save();
        if ($request->hasFile('image')) {
            $newProduct->uploadImage($request->file('image'));
        }

        return redirect()->route('admin.product.index')->with('success', __('admin/Product.create_success'));
    }

    public function delete(int $id): RedirectResponse
    {
        Product::destroy($id);

        return redirect()->route('admin.product.index')->with('success', __('admin/Product.delete_success'));
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('admin/Product.edit_title');
        $viewData['product'] = Product::findOrFail($id);
        $viewData['species'] = Species::all();
        $viewData['categories'] = Category::all();

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $updateData = $request->only(['name', 'description', 'category_id', 'species_id']);
        $product->setPrice($request->input('price'));
        if (! $request->hasFile('image')) {
            $updateData['image'] = $product->getImage();
        }
        $product->update($updateData);
        $product->save();
        if ($request->hasFile('image')) {
            $product->uploadImage($request->file('image'));
        }

        return redirect()->route('admin.product.index')->with('success', __('admin/Product.update_success'));
    }
}
