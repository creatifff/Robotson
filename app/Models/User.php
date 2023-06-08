<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const IS_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'middle_name',
        'city',
        'phone_number',
        'email',
        'password',
        'image_path',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    // Получение аватарки пользователя
    public function imageUrl(): Application|string|UrlGenerator|\Illuminate\Contracts\Foundation\Application
    {
        return url('public' . Storage::url($this->image_path));
    }

    // Получение полного имени
    public function getFullNameAttribute(): string
    {
        if ($this->middle_name) {
            return $this->name . ' ' . $this->middle_name . ' ' . $this->surname;
        }

        return $this->name . ' ' . $this->surname;
    }

    // Проверка на админа
    public function isAdmin(): bool
    {
        return $this->role === self::IS_ADMIN;
    }

    // Дата регистрации пользователя
    public function createdDate(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

}
