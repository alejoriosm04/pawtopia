<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Util\ImageGCPStorage;
use App\Util\ImageLocalStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function ($app, $params) {
             $storage = env('IMAGE_STORAGE', 'local');
            if ($storage == 'local') {
                return new ImageLocalStorage();
            } elseif ($storage == 'gcp') {
                return new ImageGCPStorage();
            }
        });
    }
}

