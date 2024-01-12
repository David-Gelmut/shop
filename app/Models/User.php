<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    const ROLE_MANAGER = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'age',
        'gender',
        'address',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static function getGenders()
    {
        return [
            self::GENDER_MALE => 'мужской',
            self::GENDER_FEMALE => 'женский',
        ];
    }

    static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Администратор',
            self::ROLE_USER => 'Посетитель',
            self::ROLE_MANAGER => 'Менеджер',
        ];
    }

    public function getGenderTitleAttribute()
    {
        return self::getGenders()[$this->gender];
    }

    public function getRoleTitleAttribute()
    {
        return self::getRoles()[$this->role];
    }
}
