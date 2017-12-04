<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryContract
{
    /**
     * Get all users from database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll(): Collection;
}
