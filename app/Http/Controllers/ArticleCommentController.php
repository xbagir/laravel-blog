<?php

namespace App\Http\Controllers;

use App\Dto\StoreArticleCommentDto;
use App\Http\Requests\StoreArticleCommentRequest;
use App\Services\ArticleService;

class ArticleCommentController extends Controller
{
    /**
     * @param StoreArticleCommentRequest $request
     *
     * @param ArticleService             $articleService
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleCommentRequest $request, ArticleService $articleService)
    {
        $dto = StoreArticleCommentDto::fromRequest($request);
        $dto->setUserId(\Auth::id());

        $articleService->storeComment($dto);

        return back();
    }

}
