<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.11.2017
 * Time: 22:40
 */

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
    /** @var CommentRepository */
    protected $commentRepository;

    /**
     * CommentService constructor.
     *
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Get all comments from database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return $this->commentRepository->getAll();
    }

}