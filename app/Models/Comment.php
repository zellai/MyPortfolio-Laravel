<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'userComment',
    
    ];

    // Relationship to listing
    public function listings() {
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }
}
