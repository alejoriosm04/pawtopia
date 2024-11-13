<?php
namespace App\Util;

use App\Interfaces\ImageStorage;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;

class ImageGCPStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        if ($request->hasFile('image')) {
            $gcpKeyFile = file_get_contents(base_path(env('GCP_KEY_FILE')));
            $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
            $bucket = $storage->bucket(env('GCP_BUCKET'));

            $fileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

            $bucket->upload(
                file_get_contents($request->file('image')->getRealPath()),
                ['name' => $fileName]
            );

            return sprintf('https://storage.googleapis.com/%s/%s', env('GCP_BUCKET'), $fileName);
        }

        throw new \Exception('No image file found in the request.');
    }
}
