<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\View\View;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['species_categories'] = Species::with('categories')->get();

        return view('home.index')
            ->with('viewData', $viewData)
            ->with('breadcrumbs', Breadcrumbs::render('home'));
    }
}
