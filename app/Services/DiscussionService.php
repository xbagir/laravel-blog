<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.11.2017
 * Time: 22:33
 */

namespace App\Services;

use App\Discussion;
use App\Dto\StoreDiscussionCommentDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\DiscussionRepositoryContract as DiscussionRepository;

class DiscussionService
{
    /** @var DiscussionRepository  */
    protected $discussionRepository;

    public function __construct(DiscussionRepository $discussionRepository)
    {
        $this->discussionRepository = $discussionRepository;
    }

    /**
     * Get all articles from database.
     *
     * @return Collection|static[]
     */
    public function getAll() : Collection
    {
        return $this->discussionRepository->getAll();
    }

    /**
     * Get the discussion model by id.
     *
     * @param int $perPage
     *
     * @return Discussion|null
     */
    public function getById(int $id) : ?Discussion
    {
        return $this->discussionRepository->getById($id);
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage) : LengthAwarePaginator
    {
        return $this->discussionRepository->paginate($perPage);
    }

    /**
     * Check if discussion exists
     *
     * @param int $id
     *
     * @return bool
     */
    public function existsById(int $id) : bool
    {
        return $this->discussionRepository->existsById($id);
    }

    /**
     * Add comment to discussion.
     *
     * @param StoreDiscussionCommentDto $dto
     *
     * @return bool
     *
     * @throws \Exception|\Throwable
     */
    public function storeComment(StoreDiscussionCommentDto $dto) : bool
    {
        return $this->discussionRepository->storeComment($dto);
    }
}