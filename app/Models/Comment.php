<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'userComment',
    
    ];

    // Relationship to listing
    public function listings() {
        return $this->belongTo(Listing::class, 'listing_id');
    }
}
