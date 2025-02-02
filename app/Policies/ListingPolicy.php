<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListingPolicy
{

    public function before(User $user)
    {
        return $user->role === 'superAdmin' ? true : null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function allPending(User $user): bool
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Listing $listing): bool
    {
        return ($listing->user->role !== 'suspended' || $user->role == 'admin') && ($listing->approved == true || $user->role === 'admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role !== 'suspended';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        return $listing->user_id == $user->id && $listing->user->role !== 'suspended';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): bool
    {
        return $listing->user_id === $user->id && $listing->user->role !== 'suspended';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently approved the model.
     */
    public function approved(User $user, Listing $listing): bool
    {

        return $user->role == 'admin' && $listing->user->role != 'suspended';
    }

    public function reject(User $user, Listing $listing)
    {
        return $user->role === 'admin';
    }
}
