<?php

namespace App\Services\ShoppingCart;

use Illuminate\Support\Facades\Http;

class GiftService
{
    private $apiUrl;

    private $productBaseLink;

    public function __construct()
    {
        $this->apiUrl = config('services.external_api.products_url');
        $this->productBaseLink = config('services.external_api.product_base_link');
    }

    public function getRandomGiftProduct(): array
    {
        $response = Http::get($this->apiUrl);

        if ($response->ok()) {
            $products = $response->json()['data'];
            $randomProduct = $products[array_rand($products)];

            $productLink = "{$this->productBaseLink}/{$randomProduct['id']}";

            if (! preg_match('~^(?:f|ht)tps?://~i', $productLink)) {
                $productLink = 'http://'.$productLink;
            }

            return [
                'product_name' => $randomProduct['name'],
                'product_link' => $productLink,
                'coupon_code' => strtoupper(bin2hex(random_bytes(5))),
            ];
        }

        throw new \Exception('Failed to fetch products from the external API.');
    }
}
