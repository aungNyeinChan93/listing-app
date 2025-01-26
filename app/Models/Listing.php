<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['user_id'] ?? false) {
            return $query->where('user_id', request('user_id'));
        }
        if ($filters['tag'] ?? false) {
            return $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }
    }

    public function scopeTest($query, $filters)
    {
        if ($filters === 'test') {
            return $query->where('id', 10);
        }


    }
}

