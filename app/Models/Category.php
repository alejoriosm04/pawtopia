<?php

// Lina Ballesteros

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->attributes['description'] - string - contains the category description
     * $this->attributes['species_id'] - int - references the associated species
     * $this->attributes['created_at'] - timestamp - contains the category creation date
     * $this->attributes['updated_at'] - timestamp - contains the category update date
     */
    protected $fillable = [
        'name',
        'description',
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function getSpeciesId(): int
    {
        return $this->attributes['species_id'];
    }

    public function setSpeciesId(int $speciesId): void
    {
        $this->attributes['species_id'] = $speciesId;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'species_id' => 'required|exists:species,id',
        ]);
    }
}
