<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $folder = ''): string
    {
        $fileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $folder ? $folder . '/' . $fileName : $fileName;

        Storage::disk('public')->put($path, file_get_contents($request->file('image')->getRealPath()));

        return $path;
    }
    public function delete(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

}

