<?php

namespace App\Contracts;

use App\Article;
use App\Dto\StoreArticleCommentDto;
use App\Dto\StoreArticleDto;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryContract
{

    /**
     *
     * Get article by id.
     *
     * @param int $id
     *
     * @return Article|null
     */
    public function getById(int $id) : ?Article;

    /**
     * Get all articles from database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll() : Collection;

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param  int  $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage) : \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    /**
     * Get the article model by slug.
     *
     * @param string $slug
     *
     * @return Article|null
     */
    function getFirstBySlug(string $slug) : ?Article;

    /**
     * Search all articles by title
     *
     * @param string $title
     *
     * @return Collection
     */
    function searchByTitle(string $title) : Collection;

    /**
     * Check if article exists
     *
     * @param int $id
     *
     * @return bool
     */
    public function existsById(int $id) : bool;

    /**
     * Store article
     *
     * @param StoreArticleDto $dto
     *
     * @return bool
     */
    public function store(StoreArticleDto $dto): bool;

    /**
     * Add comment to article.
     *
     * @param StoreArticleCommentDto $dto
     *
     * @return bool
     *
     * @throws \Exception|\Throwable
     */
    public function storeComment(StoreArticleCommentDto $dto) : bool;

    /**
     * Delete article
     *
     * @param  int  $id
     *
     * @return bool
     */
    public function delete(int $id) : bool;
}
