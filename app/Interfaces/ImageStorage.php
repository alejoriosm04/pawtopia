<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage
{
    public function store(Request $request, string $folder): string;

    public function delete(string $path): void;
}
