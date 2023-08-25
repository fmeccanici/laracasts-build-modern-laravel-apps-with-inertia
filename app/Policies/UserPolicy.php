<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{

    public function create(User $user): bool
    {
        return $user->email === 'florismeccanici@tutanota.com';
    }

    public function edit(User $user, User $model): bool
    {
        return (bool) mt_rand(0, 1);
    }
}
