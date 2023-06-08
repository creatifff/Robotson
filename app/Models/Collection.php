<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path'
    ];

    // У одной категории много товаров
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Картинка категории
    public function image(): Application|string|UrlGenerator|\Illuminate\Contracts\Foundation\Application
    {
        return url('public' . Storage::url($this->image_path));
    }

    public function createdDate(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }
}
