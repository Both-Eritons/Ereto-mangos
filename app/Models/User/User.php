<?php

namespace App\Models\User;

use App\Models\Favorite\Favorite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as AuthUser;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class User extends AuthUser implements JWTSubject
{
    use HasFactory, HasRoles;

    public $fillable = [
        "username",
        "email",
        "password"
    ];

    public $hidden = [
        "password"
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function favorites(): HasMany {
        return $this->hasMany(Favorite::class);
    }

}
