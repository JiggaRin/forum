<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Категории автора.
     *
     * @return HasMany
     */
    public function category()
    {
        return $this->hasMany(Categories::class);
    }

    /**
     * Статьи автора.
     *
     * @return HasMany
     */
    public function post()
    {
        return $this->hasMany(Posts::class);
    }

    /**
     * Комментарии автора.
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
