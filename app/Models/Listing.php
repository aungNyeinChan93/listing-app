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
        // dd($filters['user_id']);
        if($filters['user_id'] ?? false){
            return $query->where('user_id',request('user_id'));
        }
    }

    public function scopeTest($query, $filter)
    {
        if ($filter === 'test') {
            return $query->where('id',10);
        }
    }
}

