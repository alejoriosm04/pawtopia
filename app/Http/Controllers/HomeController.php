<?php

namespace App\Http\Controllers;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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

    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'es'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
}
