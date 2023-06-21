<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    // Получение продуктов из заказа
    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    // Получение пользователя из заказа
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Форматирование цены в заказе
    public function totalPrice(): string
    {
        return number_format($this->total, 0, ',', ' ') . ' ₽';
    }


}
