<?php

// Lina Ballesteros

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class Species extends Model
{
    /**
     * SPECIES ATTRIBUTES
     * $this->attributes['id'] - int - contains the species primary key (id)
     * $this->attributes['name'] - string - contains the species name
     * $this->attributes['created_at'] - timestamp - contains the creation date of the species
     * $this->attributes['updated_at'] - timestamp - contains the last update date of the species
     */
    protected $fillable = [
        'name',
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255|unique:species,name',
        ]);
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function getPets(): Collection
    {
        return $this->pets;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function getCategories(): Collection
    {
        return $this->categories;
    }
}
