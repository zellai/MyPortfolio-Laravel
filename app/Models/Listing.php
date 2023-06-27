<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Listing as Authenticatable;


class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }  

    // Relationship to User
    public function user() {
        return $this->belongTo(User::class, 'user_id');
    }

    // Relationship to Comment
    public function comment() {
        return $this->hasMany(Comment::class, 'listing_id');
    }
}
    