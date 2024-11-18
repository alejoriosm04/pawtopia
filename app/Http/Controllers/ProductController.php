<?php

// Lina Ballesteros

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Species;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Product.index_title');
        $viewData['subtitle'] = __('Product.index_subtitle');
        $viewData['products'] = Product::all();
        $viewData['species_categories'] = Species::with('categories')->get();
        $viewData['breadcrumbs'] = Breadcrumbs::render('product.index');
        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View|RedirectResponse
    {
        try {
            $product = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('home.index')->withErrors(__('Product.not_found'));
        }

        $viewData = [];
        $viewData['title'] = $product->getName();
        $viewData['subtitle'] = $product->getName().' - '.__('Product.product_info');
        $viewData['species_categories'] = Species::with('categories')->get();
        $viewData['product'] = $product;
        $viewData['breadcrumbs'] = Breadcrumbs::render('product.show', $product);
        return view('product.show')->with('viewData', $viewData);
    }

    public function filterBySpecies(string $species): View|RedirectResponse
    {
        $viewData = [];
        $speciesModel = Species::where('name', 'LIKE', $species)->first();

        if (! $speciesModel) {
            return redirect()->route('home.index');
        }

        $viewData['species'] = $speciesModel;
        $viewData['title'] = __('Product.category_title', ['category' => $speciesModel->getName()]);
        $viewData['subtitle'] = __('Product.category_subtitle', ['category' => $speciesModel->getName()]);
        $viewData['products'] = Product::where('species_id', $speciesModel->getId())->get();
        $viewData['species_categories'] = Species::with('categories')->get();
        $viewData['breadcrumbs'] = Breadcrumbs::render('product.species', $speciesModel);

        return view('product.filter')->with('viewData', $viewData);
    }

    public function filterByCategory(int $categoryId): View
    {
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->get();
        $species = $category->getSpecies();
        $viewData = [];
        $viewData['title'] = __('Product.category_title', ['category' => $category->getName()]);
        $viewData['products'] = $products;
        $viewData['species'] = $species;
        $viewData['species_categories'] = Species::with('categories')->get();
        $viewData['breadcrumbs'] = Breadcrumbs::render('product.category', $category);

        if ($products->isEmpty()) {
            $viewData['message'] = __('Product.no_products');
        }

        return view('product.filter')->with('viewData', $viewData);
    }

    public function filterByBrand(string $brand): View
    {

        $products = Product::where('name', 'like', '%'.$brand.'%')->get();

        $viewData = [];
        $viewData['title'] = __('Products for Brand: ').ucfirst($brand);
        $viewData['products'] = $products;
        $viewData['brand'] = ucfirst($brand);
        $viewData['species_categories'] = Species::with('categories')->get();
        $viewData['breadcrumbs'] = Breadcrumbs::render('product.brand', $brand);

        return view('product.brand')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $keyword = $request->input('search');
        $viewData = [];

        $keyword = strtolower($keyword);

        $keywordsArray = explode(' ', $keyword);

        $productsQuery = Product::query();

        $productsQuery->where(function ($query) use ($keywordsArray, $keyword) {
            foreach ($keywordsArray as $word) {
                $singularWord = rtrim($word, 's');
                $query->orWhere('name', 'LIKE', '%'.$word.'%')
                    ->orWhere('name', 'LIKE', '%'.$singularWord.'%');
            }

            $query->orWhere('name', 'LIKE', '%'.str_replace(' ', '', $keyword).'%');
        });

        $productsQuery->orWhereHas('species', function ($query) use ($keywordsArray, $keyword) {
            foreach ($keywordsArray as $word) {
                $singularWord = rtrim($word, 's');
                $query->where('name', 'LIKE', '%'.$word.'%')
                    ->orWhere('name', 'LIKE', '%'.$singularWord.'%');
            }

            $query->orWhere('name', 'LIKE', '%'.str_replace(' ', '', $keyword).'%');
        });

        $productsQuery->orWhereHas('category', function ($query) use ($keywordsArray, $keyword) {
            foreach ($keywordsArray as $word) {
                $singularWord = rtrim($word, 's');
                $query->where('name', 'LIKE', '%'.$word.'%')
                    ->orWhere('name', 'LIKE', '%'.$singularWord.'%');
            }

            $query->orWhere('name', 'LIKE', '%'.str_replace(' ', '', $keyword).'%');
        });

        $products = $productsQuery->get();

        $viewData['title'] = __('Product.results_for').$keyword;
        $viewData['products'] = $products;
        $viewData['keyword'] = $keyword;
        $viewData['species_categories'] = Species::with('categories')->get();
        $viewData['breadcrumbs'] = Breadcrumbs::render('product.search', $keyword);

        return view('product.search')->with('viewData', $viewData);
    }
}
