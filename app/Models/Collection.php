<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path'
    ];

    // У одной категории много товаров
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Картинка категории
    public function image() {
        return url('public' . Storage::url($this->image_path));
    }
}
