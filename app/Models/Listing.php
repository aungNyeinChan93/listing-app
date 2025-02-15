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
        if ($filters['search'] ?? false) {
            return $query->whereAny(['title', 'description'], 'like', '%' . $filters['search'] . '%');
        }
        // return ($filters['test']?? false ) ?  'test' : false;
    }

    public function scopeTest($query, $filters)
    {
        if ($filters === 'test') {
            dd($query->with('user')->find(11)->user);
        }


    }
}

