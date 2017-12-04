<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15.11.2017
 * Time: 22:40
 */

namespace App\Services;

use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\TagRepositoryContract as TagRepository;

class TagService
{
    /** @var TagRepository */
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Get all tags from database.
     *
     * @return Collection|static[]
     */
    public function getAll(): Collection
    {
        return $this->tagRepository->getAll();
    }

    /**
     * Get Tag by name
     *
     * @param string $name
     *
     * @return Tag|null
     */
    public function getByName($name): Tag
    {
        return $this->tagRepository->getByName($name);
    }
}