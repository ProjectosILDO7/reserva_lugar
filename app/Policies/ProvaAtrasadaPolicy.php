<?php

namespace App\Policies;

use App\Models\Prova_atrasada;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProvaAtrasadaPolicy
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
     * @param  \App\Models\Prova_atrasada  $provaAtrasada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Prova_atrasada $provaAtrasada)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prova_atrasada  $provaAtrasada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Prova_atrasada $provaAtrasada)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prova_atrasada  $provaAtrasada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Prova_atrasada $provaAtrasada)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prova_atrasada  $provaAtrasada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Prova_atrasada $provaAtrasada)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prova_atrasada  $provaAtrasada
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Prova_atrasada $provaAtrasada)
    {
        //
    }
}
