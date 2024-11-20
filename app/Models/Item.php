<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains the item price
     * $this->attributes['order_id'] - int - contains the referenced order id
     * $this->attributes['product_id'] - int - contains the referenced product id
     * $this->attributes['pet_id'] - int - contains the referenced pet id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     * $this->order - Order - contains the associated Order
     * $this->product - Product - contains the associated Product
     * $this->pet - Pet - contains the associated Pet
     */
    protected $fillable = ['quantity', 'price', 'order_id', 'product_id',  'pet_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'quantity' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getPetId(): int
    {
        return $this->attributes['pet_id'];
    }

    public function setPetId(int $petId): void
    {
        $this->attributes['pet_id'] = $petId;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $productId): void
    {
        $this->attributes['product_id'] = $productId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function getPet(): Pet
    {
        return $this->pet;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }
}
