<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function delete(User $user, Comment $comment)
    {
        // Seul l'administateur ou le créateur du commentaire peut supprimer un commentaire
        return \App\Models\Role::ADMIN === $user->role->name || $user->id === $comment->user_id;
    }
}
