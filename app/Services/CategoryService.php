<?php

namespace App\Services;

use App\Category;
use App\Contracts\CategoryRepositoryContract as CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /** @var CategoryRepository $categoryRepository */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     *
     * Get category by id.
     *
     * @param int $id
     *
     * @return Category|null
     */
    public function getById(int $id): ?Category
    {
        return $this->categoryRepository->getById($id);
    }

    /**
     * Get all categories from database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return $this->categoryRepository->getAll();
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
        return $this->categoryRepository->getBySlug($slug);
    }
}