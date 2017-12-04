<?php

namespace App\Repositories;

use App\Category;
use App\Contracts\CategoryRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryContract
{

    /**
     * Get category by id.
     *
     * @param int $id
     *
     * @return Category|null
     */
    public function getById(int $id): ?Category
    {
        return Category::find($id);
    }

    /**
     * Get all of the models from the database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return Category::all();
    }

    /**
     * Get the category model by slug.
     *
     * @param string $slug
     *
     * @return Category|null
     */
    public function getBySlug(string $slug): ?Category
    {
        return Category::where('slug', $slug)->first();
    }
}
