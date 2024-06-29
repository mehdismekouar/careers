<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;

class EmployerPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employer $employer): bool
    {
        return $user->is_admin ?: $user->employer->id === $employer->id;
    }

    /**
     * Determine whether the user can list the model.
     */
    public function list(User $user): bool
    {
        return $user->is_admin;
    }
}
