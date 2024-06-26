<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, user $model): bool
    {
        return $model->id === $user->id;
    }
}
