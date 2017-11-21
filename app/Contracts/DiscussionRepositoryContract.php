<?php

namespace App\Contracts;

use App\Discussion;
use App\Dto\StoreDiscussionCommentDto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DiscussionRepositoryContract
{
    /**
     * Get all articles from database.
     *
     * @return Collection|static[]
     */
    public function getAll() : Collection;

    /**
     * Get the discussion model by id.
     *
     * @param int $id
     *
     * @return Discussion|null
     */
    public function getById(int $id) : ?Discussion;

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage) : LengthAwarePaginator;

    /**
     * Check if discussion exists
     *
     * @param int $id
     *
     * @return bool
     */
    public function existsById(int $id) : bool;

    /**
     * Add comment to discussion.
     *
     * @param StoreDiscussionCommentDto $dto
     *
     * @return bool
     *
     * @throws \Exception|\Throwable
     */
    public function storeComment(StoreDiscussionCommentDto $dto) : bool;
}
