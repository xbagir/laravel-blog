<?php

namespace App\Contracts;

use App\Tag;
use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryContract
{
    /**
     * Get all tags from database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll() : Collection;

    /**
     * Get Tag by name
     *
     * @param string $name
     *
     * @return Tag|null
     */
    public function getByName(string $name) : Tag;
}
