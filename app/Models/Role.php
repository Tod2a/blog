<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 'Administrateur';
    public const AUTHOR = 'Auteur';
    public const USER = 'Utilisateur';

    public static function roles(): array
    {
        return [
            self::ADMIN,
            self::AUTHOR,
            self::USER,
        ];
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
}
