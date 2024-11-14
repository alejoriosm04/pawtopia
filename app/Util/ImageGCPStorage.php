<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request, string $folder): string
    {
        $gcpKeyFile = file_get_contents(base_path(env('GCP_KEY_FILE')));
        $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
        $bucket = $storage->bucket(env('GCP_BUCKET'));

        $fileName = $folder . '/' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

        $bucket->upload(
            file_get_contents($request->file('image')->getRealPath()),
            ['name' => $fileName]
        );

        return sprintf('https://storage.googleapis.com/%s/%s', env('GCP_BUCKET'), $fileName);
    }
    public function delete(string $path): void
    {
        $gcpKeyFile = file_get_contents(base_path(env('GCP_KEY_FILE')));
        $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
        $bucket = $storage->bucket(env('GCP_BUCKET'));

        $object = $bucket->object($path);

        if ($object->exists()) {
            $object->delete();
        }


    }

}
