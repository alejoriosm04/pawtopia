<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    /**
     * CART ATTRIBUTES
     * $this->attributes['id'] - int - contains the cart primary key (id)
     * $this->attributes['user_id'] - int - contains the id of the associated user
     * $this->attributes['product_id'] - int - contains the id of the associated product
     * $this->attributes['quantity'] - int - contains the quantity of the product in the cart
     * $this->attributes['created_at'] - timestamp - contains the cart creation date
     * $this->attributes['updated_at'] - timestamp - contains the cart update date
     */
    
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];


    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function setProductId(int $productId): void
    {
        $this->attributes['product_id'] = $productId;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    }
}
