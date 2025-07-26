<?php

namespace App\Models;

// Importaciones necesarias
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Anotaciones para ayudar a IDEs/Intelephense
/**
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blueprint[] $blueprints
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchases
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Asegúrate de que 'role' esté aquí si lo estás usando
        'avatar_path', // <-- Agregado para el avatar
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Verifica si el usuario es administrador.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        // Asegúrate de tener una columna 'role' en la tabla 'users'
        // y que los admins tengan 'role' = 'admin'
        return $this->role === 'admin';
    }

    /**
     * Get the column name for the "remember me" token.
     * (Este método ya lo proporciona Notifiable, pero puedes personalizarlo si necesitas)
     */
    public function username()
    {
        return 'email';
    }

    /* --- Relaciones --- */

    /**
     * Get the blueprints for the user.
     */
    public function blueprints(): HasMany
    {
        return $this->hasMany(Blueprint::class);
    }

    /**
     * Get the purchases for the user.
     */
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
