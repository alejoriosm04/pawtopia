<?php

// Lina Ballesteros

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['category_id'] - int - references the associated category
     * $this->attributes['species_id'] - int - references the associated species
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->items - Item[] - contains the associated Items
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'species_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): string
    {
        $image = $this->attributes['image'];

        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        return url('storage/'.ltrim($image, '/'));
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'] / 100;
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = (int) ($price * 100);
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function sumPricesByQuantities(array $products, array $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Item
    {
        return $this->items;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_favorites_products', 'product_id', 'user_id');
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getSpecies(): Species
    {
        return $this->species;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'category_id' => 'required|exists:categories,id',
            'species_id' => 'required|exists:species,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}
