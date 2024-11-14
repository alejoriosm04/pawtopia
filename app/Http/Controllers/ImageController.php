<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        $storage = $request->get('storage');
        $storeInterface = app(ImageStorage::class, ['storage' => $storage]);
        $storeInterface->store($request);

        return back()->with('success', 'Image uploaded successfully!');
    }
}
