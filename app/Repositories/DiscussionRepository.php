<?php

namespace App\Repositories;

use App\Comment;
use App\Discussion;
use App\Dto\StoreDiscussionCommentDto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Contracts\DiscussionRepositoryContract;

class DiscussionRepository implements DiscussionRepositoryContract
{
    /**
     * Get all articles from database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return Discussion::all();
    }

    /**
     * Get the discussion model by id.
     *
     * @param int $id
     *
     * @return Discussion|null
     */
    public function getById(int $id): ?Discussion
    {
        return Discussion::find($id);
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param  int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage): LengthAwarePaginator
    {
        return Discussion::paginate($perPage);
    }

    /**
     * Check if discussion exists
     *
     * @param int $id
     *
     * @return bool
     */
    public function existsById(int $id): bool
    {
        return Discussion::where('id', $id)->exists();
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
    public function storeComment(StoreDiscussionCommentDto $dto): bool
    {
        DB::transaction(
            function () use ($dto) {

                $comment = new Comment(
                    [
                        'user_id' => $dto->getUserId(),
                        'content' => $dto->getContent(),
                    ]
                );

                $discussion = Discussion::find($dto->getDiscussionId());

                $discussion->comments()->save($comment);

            }
        );

        return true;
    }

}
