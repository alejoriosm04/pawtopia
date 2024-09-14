<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.product.index_title');
        $viewData['products'] = Product::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::validate($request);

        $creationData = $request->only(["name", "description", "price"]);
        $newProduct = Product::create($creationData);
        $newProduct->uploadImage($request->file('image'));

        return redirect()->route('admin.product.index')->with('success', __('admin.product.create_success'));
    }

    public function delete($id): RedirectResponse
    {
        Product::destroy($id);

        return redirect()->route('admin.product.index')->with('success', __('admin.product.delete_success'));
    }

    public function edit($id): View
    {
        $viewData = [];
        $viewData['title'] = __('admin.product.edit_title');
        $viewData['product'] = Product::findOrFail($id);

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->uploadImage($request->file('image'));

        return redirect()->route('admin.product.index')->with('success', __('admin.product.update_success'));
    }
}
