<?php

namespace App\Policies;

use App\Models\Torneo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TorneoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Torneo $torneo)
    {
        return ($user->id === $torneo->user_id) || ($user->role == 'admin');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return ($user->role == 'organizador') || ($user->role == 'admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Torneo $torneo)
    {
        return ($user->id === $torneo->user_id) || ($user->rol == 'Admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Torneo $torneo)
    {
        return ($user->id === $torneo->user_id) || ($user->role == 'Admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Torneo $torneo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Torneo  $torneo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Torneo $torneo)
    {
        //
    }
}
