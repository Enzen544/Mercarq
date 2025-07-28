<?php

namespace App\Models;

// Importaciones necesarias
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'role',
        'avatar_path',
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
        return $this->role === 'admin';
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function username()
    {
        return 'email';
    }

    /**
     *
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar_path) {
            return asset('storage/' . $this->avatar_path);
        }
        
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
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

    /**
     * Get the blueprints that are public for this user.
     */
    public function publicBlueprints(): HasMany
    {
        return $this->blueprints()->where('is_public', true);
    }

    /**
     * Get the total earnings from blueprint sales for this user.
     */
    public function getTotalEarningsAttribute(): float
    {
        return $this->blueprints()
            ->join('purchases', 'blueprints.id', '=', 'purchases.blueprint_id')
            ->where('purchases.status', 'completed')
            ->sum('purchases.amount');
    }
}