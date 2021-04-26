<?php

namespace App\Policies;

use App\User;
use App\recipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class recipePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any recipes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\recipe  $recipe
     * @return mixed
     */
    public function view(User $user, recipe $recipe)
    {
        return $user->id==$recipe->user_id;
    }

    /**
     * Determine whether the user can create recipes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\recipe  $recipe
     * @return mixed
     */
    public function update(User $user, recipe $recipe)
    {
        //
    }

    /**
     * Determine whether the user can delete the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\recipe  $recipe
     * @return mixed
     */
    public function delete(User $user, recipe $recipe)
    {
        //
    }

    /**
     * Determine whether the user can restore the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\recipe  $recipe
     * @return mixed
     */
    public function restore(User $user, recipe $recipe)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the recipe.
     *
     * @param  \App\User  $user
     * @param  \App\recipe  $recipe
     * @return mixed
     */
    public function forceDelete(User $user, recipe $recipe)
    {
        //
    }
}
