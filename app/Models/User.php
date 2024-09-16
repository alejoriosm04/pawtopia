<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
     */
    
    protected $fillable = [
        'name',  
        'email',  
        'password', 
        'image',  
        'address', 
        'credit_card',  
    ];

    protected $hidden = [
        'password',  
        'remember_token',
        'credit_card',  
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Getters and Setters for encapsulation


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
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getCreditCard(): string
    {
        return $this->attributes['credit_card'];
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
        $this->attributes['password'] = Hash::make($value);
    }


    // Relaciones

    /**
     * Define the relationship with pets (1:N)
     */
    //public function pets()
    //{
    //    return $this->hasMany(Pet::class);
    //}

    /**
     * Define the relationship with favorite products (N:M)
     */
    //public function favList()
    //{
    //    return $this->belongsToMany(Product::class, 'user_favorites');
    //}

    // Validaciones

    public static function validate($request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'credit_card' => 'nullable|string|size:16',
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ]);
    }
    
}
