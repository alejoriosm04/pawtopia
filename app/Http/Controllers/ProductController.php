<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Species;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Product.index_title');
        $viewData['subtitle'] = __('Product.index_subtitle');
        $viewData['products'] = Product::all();
        $viewData['species_categories'] = Species::with('categories')->get();


        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $product = Product::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
        $viewData['title'] = $product->getName();
        $viewData['subtitle'] = $product->getName().' - '.__('Product.product_info');

        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }
    public function filterBySpecies(string $species): View|RedirectResponse
{
    $viewData = [];
    $speciesModel = Species::where('name', $species)->first();

    if (!$speciesModel) {
        return redirect()->route('home.index');
    }

    $viewData['title'] = __('Product.category_title', ['category' => $speciesModel->getName()]);
    $viewData['subtitle'] = __('Product.category_subtitle', ['category' => $speciesModel->getName()]);
    $viewData['products'] = Product::where('species_id', $speciesModel->getId())->get();

    return view('product.index')->with('viewData', $viewData);
}

}
