<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Movie $movie)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function delete(User $user, Movie $movie)
    {
        return $user->role === 'admin';
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
}
