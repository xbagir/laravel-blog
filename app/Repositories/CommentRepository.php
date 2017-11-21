<?php

namespace App\Repositories;

use App\Comment;
use App\Contracts\CommentRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository implements CommentRepositoryContract
{

    /**
     * Get all of the models from the database.
     *
     * @return Collection|static[]
     */
    public function getAll() : Collection
    {
        return Comment::all();
    }

}
