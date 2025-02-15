<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    // listings
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // filter
    public function scopeFilter($query, array $filters)
    {

        if ($filters['search'] ?? false) {
            $query->where(function ($q1) use ($filters) {
                $q1->whereAny(['name', 'email', 'role'], 'like', '%' . $filters['search'] . '%');
            });
        }

        if (($filters['role'] ?? false) && ($filters['role'] !== 'all' ?? false)) {
            $query->where(function ($q1) {
                $q1->where('role', 'like', '%' . request()->role . '%');
            });
        }
        if ($filters['status'] ?? false) {
            if ($filters['status'] === 'approve') {
                $query->whereHas('listings', function (Builder $builder) {
                    $builder->where('approved', true);
                });
            }
            if ($filters['status'] === 'pending') {
                $query->whereHas('listings', function (Builder $builder) {
                    $builder->where('approved', false);
                });
            }

        }
    }
}
