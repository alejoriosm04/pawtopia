<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
