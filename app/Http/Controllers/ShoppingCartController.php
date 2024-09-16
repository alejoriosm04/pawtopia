<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products', []);
        $quantity = $request->input('quantity', 1);
        
        // Agregar o actualizar el producto en el carrito
        $products[$id] = $quantity;

        // Guardar en la sesión
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function index(Request $request)
    {
       
        $productsInCart = $request->session()->get('products', []);
    
    
        $products = Product::findMany(array_keys($productsInCart));
    
        // Calcular el total
        $total = 0;
        foreach ($products as $product) {
            $total += $product->getPrice() * $productsInCart[$product->getId()];
        }
    
        // Preparar datos para la vista
        $viewData = [];
        $viewData['title'] = "Shopping Cart";
        $viewData['subtitle'] = "Review your items";
        $viewData['products'] = $products;
        $viewData['productsInCart'] = $productsInCart;
        $viewData['total'] = $total; // Aquí se pasa el total a la vista
    
        return view('shoppingcart.index')->with('viewData', $viewData);
    }

    public function remove(Request $request, $id)
    {
        $products = $request->session()->get('products', []);

        // Remover el producto del carrito
        unset($products[$id]);

        // Actualizar la sesión
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $productsInCart = $request->session()->get('products', []);
    
        $productsInCart[$request->input('id')] = $request->input('quantity');
    
        $request->session()->put('products', $productsInCart);
    
        return response()->json(['success' => true]);
    }
    
}