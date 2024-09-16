<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contiene la clave primaria del pedido.
     * $this->attributes['total'] - int - contiene el total del pedido.
     * $this->attributes['user_id'] - int - contiene el id del usuario que hizo el pedido.
     * $this->attributes['created_at'] - timestamp - contiene la fecha de creación.
     * $this->attributes['updated_at'] - timestamp - contiene la fecha de actualización.
     * $this->user - User - contiene el usuario asociado.
     * $this->items - Item[] - contiene los items asociados.
     */

    
    public function getId(): int
    {
        return $this->attributes['id'];
    }
    
    public function getTotal(): int
    {
        return $this->attributes['total'];
    }
    
    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }
    
    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }
    
    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //public function items()
    //{
    //    return $this->hasMany(Item::class);
    //}

    public static function validate($request): void
    {
        $request->validate([
            'total' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);
    }
}
