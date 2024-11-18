<?php

namespace App\Http\Controllers;

use App\Models\Species;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];

        return view('home.index')
            ->with('viewData', $viewData)
            ->with('breadcrumbs', Breadcrumbs::render('home'));
    }
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'es'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
}
