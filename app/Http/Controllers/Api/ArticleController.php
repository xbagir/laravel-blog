<?php

namespace App\Http\Controllers\Api;

use App\Dto\StoreArticleDto;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /** @var ArticleService */
    protected $articleService;

    /**
     * ArticleController constructor.
     *
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ArticleResource::collection($this->articleService->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreArticleRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $dto = StoreArticleDto::fromRequest($request);
        $dto->setUserId(Auth::id());

        $this->articleService->store($dto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->articleService->delete($id);
    }
}
