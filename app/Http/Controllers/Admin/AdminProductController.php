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
use App\Interfaces\ImageStorage;
use Exception;

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

        $creationData = $request->only(['name', 'description', 'category_id', 'species_id', 'price']);
        $newProduct = Product::create($creationData);

        try {
            $storageType = $request->input('storage_type', 'local');
            $imageStorage = app()->makeWith(ImageStorage::class, ['storage' => $storageType]);

            if ($request->hasFile('image')) {
                $publicUrl = $imageStorage->store($request, 'products');
                $newProduct->setImage($publicUrl);
            } else {
                $newProduct->setImage('img/default_image.png');
            }

            $newProduct->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', __('admin/Product.create_error'));
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


        $storageType = $request->input('storage_type', 'local');
        $imageStorage = app()->makeWith(ImageStorage::class, ['storage' => $storageType]);

        if ($request->hasFile('image')) {

            if ($product->getImage() !== 'img/default_image.png') {
                $previousImagePath = str_replace(url('storage') . '/', '', $product->getImage());
                $imageStorage->delete($previousImagePath);
            }

            $updateData['image'] = $imageStorage->store($request, 'products');
        }

        $product->update($updateData);


        return redirect()->route('admin.product.index')->with('success', __('admin/Product.update_success'));
    }

}
