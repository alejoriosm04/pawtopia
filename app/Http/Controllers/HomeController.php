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

        return view('home.index')
            ->with('viewData', $viewData)
            ->with('breadcrumbs', Breadcrumbs::render('home'));
    }
}
