<?php

namespace App\Http\Controllers;

use App\Models\Species;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\View\View;

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
