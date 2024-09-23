<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Pet extends Model
{
    use HasFactory;

    /**
     * PET ATTRIBUTES
     * $this->attributes['id'] - int - contains the pet primary key (id)
     * $this->attributes['name'] - string - contains the pet name
     * $this->attributes['image'] - string - contains the pet image
     * $this->attributes['species_id'] - int - references the associated species
     * $this->attributes['breed'] - string - contains the pet breed
     * $this->attributes['birthDate'] - string - contains the pet birth date
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
        'species_id',
        'breed',
        'birthDate',
        'characteristics',
        'medications',
        'feeding',
        'veterinaryNotes',
    ];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'breed' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'characteristics' => 'required|array',
            'medications' => 'required|string|max:255',
            'feeding' => 'required|string|max:255',
            'veterinaryNotes' => 'required|string|max:255',
        ]);
    }

    public static function storeImage(UploadedFile $image): string
    {
        return $image->store('images/pets', 'public');
    }

    public function deleteImage(): void
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image);
        }
    }

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

    public function getBreed(): string
    {
        return $this->attributes['breed'];
    }

    public function setBreed(string $breed): void
    {
        $this->attributes['breed'] = $breed;
    }

    public function getBirthDate(): string
    {
        return $this->attributes['birthDate'];
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->attributes['birthDate'] = $birthDate;
    }

    public function getAge(): int
    {
        $birthDate = new DateTime($this->attributes['birthDate']);
        $now = new DateTime;
        $interval = $now->diff($birthDate);

        return $interval->y;
    }

    public function getCharacteristics(): array
    {
        return json_decode($this->attributes['characteristics'], true);
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

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
