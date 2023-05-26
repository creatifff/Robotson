<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'image_path',
        'price',
        'quantity',
        'is_published',
        'collection_id'
    ];

    // У одного товара много картинок
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Форматирование цены
    public function money(): string
    {
        return number_format($this->price, 2, ',', ' ') . ' ₽';
    }

    // Привязка категории к товару
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    // Получение картинки продукта
    public function imageUrl()
    {
        return url('public' . Storage::url($this->image_path));
    }
}
