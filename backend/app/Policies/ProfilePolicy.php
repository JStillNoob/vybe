<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;

class ProfilePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(?User $user, Profile $profile): bool
    {
        if ($profile->is_public) {
            return true;
        }

        return $user !== null && ($user->id === $profile->user_id || $user->role === 'super_admin');
    }

    public function update(User $user, Profile $profile): bool
    {
        return $user->id === $profile->user_id || $user->role === 'super_admin';
    }

    public function delete(User $user, Profile $profile): bool
    {
        return $user->id === $profile->user_id || $user->role === 'super_admin';
    }
}
