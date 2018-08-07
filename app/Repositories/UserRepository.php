<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository
{
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);  
        return User::create($data);
    }
}