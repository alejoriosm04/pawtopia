<?php

// app/Http/Controllers/Controller.php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $speciesCategories = Species::with('categories')->get();
        view()->share('species_categories', $speciesCategories);
    }
}
