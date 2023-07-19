<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class IsAdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function isadmin(User $user): bool
    {
        return $user->id === 1;
    }
}
