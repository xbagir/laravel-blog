<?php

namespace App\Repositories;

use App\User;
use App\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryContract
{

    /**
     * Get all of the models from the database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return User::all();
    }

}
