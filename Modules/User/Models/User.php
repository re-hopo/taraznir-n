<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
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


    public function canAccessFilament(): bool
    {
        return $this->hasAnyRole( Role::all()) || $this->meta()->where('key' ,'is_admin' )->count();
    }

    public function isAdmin(): bool
    {
        return $this->meta()->where('key' ,'is_admin' )->count();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->profile_photo_path;
    }

    public function meta(): MorphMany
    {
        return $this->morphMany('Modules\Misc\Models\Meta' , 'metaable');
    }
}
