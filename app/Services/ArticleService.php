<?php

namespace App\Services;

use App\Article;
use App\Contracts\ArticleRepositoryContract as ArticleRepository;
use App\Dto\StoreArticleCommentDto;
use App\Dto\StoreArticleDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ArticleService
{
    /** @var ArticleRepository */
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     *
     * Get article by id.
     *
     * @param int $id
     *
     * @return Article|null
     */
    public function getById(int $id): ?Article
    {
        return $this->articleRepository->getById($id);
    }

    /**
     * Get all articles.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return $this->articleRepository->getAll();
    }

    /**
     *  Get the article by slug.
     *
     * @param string $slug
     *
     * @return \App\Article|null
     */
    public function getBySlug(string $slug): ?Article
    {
        return $this->articleRepository->getFirstBySlug($slug);
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage): LengthAwarePaginator
    {
        return $this->articleRepository->paginate($perPage);
    }

    /**
     * Search all articles by title
     *
     * @param string $title
     *
     * @return Collection
     */
    public function searchByTitle(string $title): Collection
    {
        $title = trim($title);

        return $this->articleRepository->searchByTitle($title);
    }

    /**
     * Check if article exists
     *
     * @param int $id
     *
     * @return bool
     */
    public function existsById(int $id): bool
    {
        return $this->articleRepository->existsById($id);
    }

    /**
     * Store article
     *
     * @param StoreArticleDto $dto
     *
     * @return bool
     */
    public function store(StoreArticleDto $dto): bool
    {
        try {
            return $this->articleRepository->store($dto);
        } catch (\Exception $e) {

        }

        return false;
    }

    /**
     * Add comment to article.
     *
     * @param StoreArticleCommentDto $dto
     *
     * @return bool
     * @throws \Exception|\Throwable
     */
    public function storeComment(StoreArticleCommentDto $dto): bool
    {
        try {
            return $this->articleRepository->storeComment($dto);
        } catch (\Exception $e) {

        }

        return false;
    }

    /**
     * Delete article
     *
     * @param  int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->articleRepository->delete($id);
    }

}