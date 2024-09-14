<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    /**
     * PET ATTRIBUTES
     * $this->attributes['id'] - int - contains the pet primary key (id)
     * $this->attributes['name'] - string - contains the pet name
     * $this->attributes['image'] - string - contains the pet image
     * $this->attributes['specie'] - string - contains the pet specie
     * $this->attributes['breed'] - string - contains the pet breed
     * $this->attributes['birthDate'] - date - contains the pet birth date
     * $this->attributes['characteristics'] - array - contains the pet characteristics
     * $this->attributes['medications'] - string - contains the pet medications
     * $this->attributes['feeding'] - string - contains the pet feeding
     * $this->attributes['veterinaryNotes'] - string - contains the pet veterinary notes
     * $this->attributes['user'] - User contains the pet owner
     * $this->attributes['items'] - Item[] contains the pet items
     */
    
    protected $fillable = [
        'name',
        'image',
        'species',
        'breed',
        'age',
        'healthData',
        'feeding',
        'exercise',
        'reminders',
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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getSpecie(): string
    {
        return $this->attributes['specie'];
    }

    public function setSpecie(string $specie): void
    {
        $this->attributes['specie'] = $specie;
    }

    public function getBreed(): string
    {
        return $this->attributes['breed'];
    }

    public function setBreed(string $breed): void
    {
        $this->attributes['breed'] = $breed;
    }

    public function getbirthDate(): date
    {
        return $this->attributes['birthDate'];
    }

    public function setbirthDate(date $birthDate): void
    {
        $this->attributes['birthDate'] = $birthDate;
    }

    public function getCharacteristics(): array
    {
        return $this->attributes['characteristics'];
    }

    public function setCharacteristics(array $characteristics): void
    {
        $this->attributes['characteristics'] = $characteristics;
    }

    public function getMedications(): string
    {
        return $this->attributes['medications'];
    }

    public function setMedications(string $medications): void
    {
        $this->attributes['medications'] = $medications;
    }

    public function getFeeding(): string
    {
        return $this->attributes['feeding'];
    }

    public function setFeeding(string $feeding): void
    {
        $this->attributes['feeding'] = $feeding;
    }

    public function getVeterinaryNotes(): string
    {
        return $this->attributes['veterinaryNotes'];
    }

    public function setVeterinaryNotes(string $veterinaryNotes): void
    {
        $this->attributes['veterinaryNotes'] = $veterinaryNotes;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->attributes['user'];
    }

    public function setUser(User $user): void
    {
        $this->attributes['user'] = $user;
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): array
    {
        return $this->attributes['items'];
    }

    public function setItems(array $items): void
    {
        $this->attributes['items'] = $items;
    }
}
