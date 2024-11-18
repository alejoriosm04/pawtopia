<?php

// Lina Ballesteros

namespace App\Http\Controllers;

use App\Models\Species;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class CategoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['species'] = Species::with('categories')->get();

        return view('layouts.app')->with('viewData', $viewData);
    }
}
