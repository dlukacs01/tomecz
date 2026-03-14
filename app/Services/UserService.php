<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    // FIND BY ID
    public function getById(int $int): User
    {
        return User::findOrFail($int);
    }
}
