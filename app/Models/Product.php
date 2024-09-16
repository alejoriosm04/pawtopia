<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
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

    public function species()
    {
        return $this->belongsTo(Species::class);
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

    public function uploadImage($file)
    {
        if ($file) {
            $imageName = $this->getId().'.'.$file->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($file->getRealPath())
            );
            $this->setImage($imageName);
            $this->save();
        }
    }
}
