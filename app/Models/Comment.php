<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Relationship to User
    public function user() {
        return $this->belongTo(User::class, 'user_id');
    }
}
