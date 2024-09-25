<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Species;
use Illuminate\Http\Request;    
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function add(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($id);

        $products = $request->session()->get('products', []);
        $newQuantity = $request->input('quantity', 1);

        if (isset($products[$id])) {
            $products[$id] += $newQuantity;
        } else {
            $products[$id] = $newQuantity;
        }

        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function index(Request $request): View
    {
        $productsInCart = $request->session()->get('products', []);
        $products = Product::with('category')->findMany(array_keys($productsInCart));

        $total = 0;
        foreach ($products as $product) {
            $total += $product->getPrice() * $productsInCart[$product->getId()];
        }

        $viewData = [];
        $viewData['title'] = __('cart.title');
        $viewData['subtitle'] = __('cart.subtitle');
        $viewData['products'] = $products;
        $viewData['productsInCart'] = $productsInCart;
        $viewData['total'] = $total;
        $viewData['species_categories'] = Species::with('categories')->get();

        return view('shoppingcart.index')->with('viewData', $viewData);
    }

    public function remove(Request $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $products = $request->session()->get('products', []);
        unset($products[$id]);
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->input('id'));

        $productsInCart = $request->session()->get('products', []);
        $productsInCart[$request->input('id')] = $request->input('quantity');
        $request->session()->put('products', $productsInCart);

        return response()->json(['success' => true]);
    }
}
