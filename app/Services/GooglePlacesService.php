<?php

namespace App\Services;

use GuzzleHttp\Client;

class GooglePlacesService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.google.places_api_key');
        $this->client = new Client([
            'base_uri' => 'https://maps.googleapis.com/maps/api/place/',
        ]);
    }

    public function searchPetFriendlyPlaces($latitude, $longitude, $radius = 2000): array
    {
        $response = $this->client->request('GET', 'nearbysearch/json', [
            'query' => [
                'location' => "{$latitude},{$longitude}",
                'radius' => $radius,
                'type' => 'park|pet_store|veterinary_care|store',
                'keyword' => 'pet friendly',
                'key' => $this->apiKey,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['results'] ?? [];
    }
}
