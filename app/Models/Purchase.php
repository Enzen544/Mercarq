<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blueprint_id',
        'amount',
        'payment_method',
        'payment_reference',
        'status',
    ];

    /**
     * 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     */
    public function blueprint(): BelongsTo
    {
        return $this->belongsTo(Blueprint::class);
    }
}
