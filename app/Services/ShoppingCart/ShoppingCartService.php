<?php

namespace App\Services\ShoppingCart;

use App\Models\Order;

class ShoppingCartService
{
    protected $giftService;

    public function __construct(GiftService $giftService)
    {
        $this->giftService = $giftService;
    }

    public function attachGiftToOrder(Order $order)
    {
        if ($order->getTotal() > 100) {
            $giftProduct = $this->giftService->getRandomGiftProduct();
            $order->coupon_code = $giftProduct['coupon_code'];
            $order->external_product_link = $giftProduct['product_link'];
            $order->save();
        }
    }
}
