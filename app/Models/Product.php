<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'price',
        'quantity',
        'is_published',
        'collection_id'
    ];

    // У одного товара много картинок
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    // Форматирование цены
    public function money(): string
    {
        return number_format($this->price, 0, ',', ' ') . ' ₽';
    }

    // Привязка категории к товару
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function createdDate(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

}
