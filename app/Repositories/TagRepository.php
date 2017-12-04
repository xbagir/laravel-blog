<?php

namespace App\Repositories;

use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\TagRepositoryContract;

class TagRepository implements TagRepositoryContract
{
    /**
     * Get all articles from database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return Tag::all();
    }

    /**
     * Get Tag by name
     *
     * @param string $name
     *
     * @return Tag|null
     */
    public function getByName(string $name): Tag
    {
        return Tag::where('name', $name)->first();
    }
}
