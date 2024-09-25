<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\FavoriteProduct;

class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['image'] - string - contains the user profile image path
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['credit_card'] - string - contains the user credit card information
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     * $this->attributes['favList'] - array - contains the list of favorite products
     * $this->attributes['role'] - string - contains the user role
     */
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'address',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'credit_card',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
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

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getImage(): string
    {
        return $this->attributes['image'] ?? '';
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'] ?? '';
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getCreditCard(): string
    {
        return $this->attributes['credit_card'] ?? '';
    }

    public function setCreditCard(string $creditCard): void
    {
        $this->attributes['credit_card'] = $creditCard;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    public function getPets()
    {
        return $this->pets()->get();
    }

    public function getFavList()
    {
        return $this->favList()->get();
    }

    public function getOrders()
    {
        return $this->orders()->get();
    }


    public static function validate($request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'credit_card' => 'nullable|string|size:16',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'pets' => 'nullable|string',
            'favList' => 'nullable|string',
        ]);
    }

    public function favList(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'user_favorites_products', 'user_id', 'product_id');
    }

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function pet(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmailNotification);
    }
}
