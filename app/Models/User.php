<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    public function imageUrl() {
        return url('public' . Storage::url($this->image_path));
    }

    // Получение полного имени
    public function getFullNameAttribute()
    {
        if($this->middle_name) {
            return $this->surname . ' ' . $this->name . ' ' . $this->middle_name;
        }

        return $this->surname . ' ' . $this->name;
    }

    // Проверка на админа
    public function isAdmin():bool
    {
        return $this->role === self::IS_ADMIN;
    }

    // Дата регистрации пользователя
    public function createdDate()
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

}
