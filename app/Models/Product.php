<?php

// Lina Ballesteros

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        if (str_starts_with($this->attributes['image'], 'https://storage.googleapis.com')) {
            return $this->attributes['image'];
        }

        return url('storage/'.$this->attributes['image']);
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

    public function getSpeciesId(): int
    {
        return $this->attributes['species_id'];
    }

    public function setSpeciesId(int $speciesId): void
    {
        $this->attributes['species_id'] = $speciesId;
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['category_id'] = $categoryId;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Item
    {
        return $this->items;
    }

    public function setItems(Item $items)
    {
        $this->items = $items;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_favorites_products', 'product_id', 'user_id');
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getSpecies()
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}
