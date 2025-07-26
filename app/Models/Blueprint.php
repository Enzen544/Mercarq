<?php
// app/Models/Blueprint.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blueprint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'price',
        'is_public',
    ];

    /**
     * Get the user that owns the blueprint.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the purchases for the blueprint.
     */
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
