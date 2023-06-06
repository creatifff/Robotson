<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    // Получение продуктов из заказа
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Получение пользователя из заказа
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Форматирование цены в заказе
    public function totalPrice()
    {
        return number_format($this->total, 0, ',', ' ') . ' ₽';
    }

//    // Отношение с доставкой
//    public function delivery()
//    {
//        return $this->hasOne(Delivery::class);
//    }


//    // Цена с доставкой
//    public function priceWithDelivery()
//    {
//        return number_format($this->total + $this->delivery->price, 0, ',' , ' ') . ' ₱';
//    }

}
