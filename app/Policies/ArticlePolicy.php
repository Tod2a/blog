<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return \App\Models\Role::ADMIN === $user->role->name || \App\Models\Role::AUTHOR === $user->role->name;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return \App\Models\Role::ADMIN === $user->role->name || \App\Models\Role::AUTHOR === $user->role->name;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): bool
    {
        return \App\Models\Role::ADMIN === $user->role->name || (\App\Models\Role::AUTHOR === $user->role->name && $article->user_id === $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): bool
    {
        return \App\Models\Role::ADMIN === $user->role->name || (\App\Models\Role::AUTHOR === $user->role->name && $article->user_id === $user->id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article)
    {
        //
    }
}
