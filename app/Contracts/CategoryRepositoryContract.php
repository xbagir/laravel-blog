<?php

namespace App\Contracts;

use App\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryContract
{
    /**
     * Get category by id.
     *
     * @param int $id
     *
     * @return Category|null
     */
    public function getById(int $id) : ?Category;

    /**
     * Get all categories from database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll() : Collection;

    /**
     * Get the category model by slug.
     *
     * @param string $slug
     *
     * @return Category|null
     */
    function getBySlug(string $slug) : ?Category;
}
