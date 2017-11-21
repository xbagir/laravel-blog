<?php

namespace App\Repositories;

use App\Article;
use App\Comment;
use App\Contracts\ArticleRepositoryContract;
use App\Dto\StoreArticleCommentDto;
use App\Dto\StoreArticleDto;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleRepositoryContract
{
    /**
     *
     * Get article by id.
     *
     * @param int $id
     *
     * @return Article|null
     */
    public function getById(int $id) : ?Article
    {
        return Article::find($id);
    }

    /**
     * Get all of the models from the database.
     *
     * @return Collection|static[]
     */
    public function getAll() : Collection
    {
        return Article::all();
    }

    /**
     * Paginate the given query into a simple paginator.
     *
     * @param  int  $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage) : \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Article::paginate($perPage);
    }

    /**
     * Get the article model by slug.
     *
     * @param  int  $perPage
     * @return Article | null
     */
    public function getFirstBySlug(string $slug) : ?Article
    {
        return Article::where('slug', $slug)->first();
    }

    /**
     * Search all articles by title
     *
     * @param string $title
     *
     * @return Collection
     */
    public function searchByTitle(string $title) : Collection
    {
        return Article::where('title', 'like', "%{$title}%")
                ->orderBy('created_at', 'desc')
                ->get();
    }

    /**
     * Check if article exists
     *
     * @param int $id
     *
     * @return bool
     */
    public function existsById(int $id) : bool
    {
        return Article::find($id) !== null;
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
        DB::transaction(function () use ($dto) {

            $tagIds = [];

            foreach($dto->getTags() as $name)
            {
                $tag = Tag::firstOrCreate(['name' => $name]);

                $tagIds[] = $tag->id;
            }

            $article = Article::create([
                'category_id' => $dto->getCategoryId(),
                'user_id'     => $dto->getUserId(),
                'slug'        => $dto->getSlug(),
                'title'       => $dto->getTitle(),
                'subtitle'    => $dto->getSubtitle(),
                'content'     => $dto->getContent(),
                'image'       => $dto->getImage(),
            ]);

            $article->tags()->sync($tagIds);
        });

        return true;
    }

    /**
     * Add comment to article.
     *
     * @return StoreArticleCommentDto $dto
     *
     * @throws \Exception|\Throwable
     */
    public function storeComment(StoreArticleCommentDto $dto) : bool
    {
        DB::transaction(function () use ($dto) {

            $article = Article::find($dto->getArticleId());

            $comment = new Comment([
                'user_id' => $dto->getUserId(),
                'content' => $dto->getContent()
            ]);

            $article->comments()->save($comment);
        });

        return true;
    }

    /**
     * Delete article
     *
     * @param  int  $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return Article::destroy($id) != 0;
    }
}
