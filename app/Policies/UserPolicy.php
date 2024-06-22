<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Auth;

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
