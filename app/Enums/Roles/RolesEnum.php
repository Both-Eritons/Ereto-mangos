<?php

namespace App\Enums\Roles;

enum RolesEnum: string
{
    case FOUNDER = 'ancestral';
    case ADMIN = 'administrator';
    case MOD = 'moderator';
    case UPLOADER = 'uploader';
    case VIP = 'vip';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            static::FOUNDER => 'founders',
            static::ADMIN => 'administrators',
            static::MOD => 'moderators',
            static::UPLOADER => 'uploaders',
            static::VIP => 'vips',
            static::USER => 'users',
        };
    }
}
