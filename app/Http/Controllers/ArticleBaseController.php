<?php

namespace App\Http\Controllers;

use View;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\TagService;

abstract class ArticleBaseController extends Controller
{
    /** @var CategoryService */
    protected $articleService;

    /** @var CategoryService */
    protected $categoryService;

    /** @var TagService */
    protected $tagService;

    /**
     * ArticleBaseController constructor.
     *
     * @param ArticleService  $articleService
     * @param CategoryService $categoryService
     * @param TagService      $tagService
     */
    public function __construct(
        ArticleService $articleService,
        CategoryService $categoryService,
        TagService $tagService
    ) {
        $this->articleService  = $articleService;
        $this->categoryService = $categoryService;
        $this->tagService      = $tagService;

        $this->initGlobalViewValues();
    }

    protected function initGlobalViewValues()
    {
        View::share('categories', $this->categoryService->getAll());
        View::share('tags', $this->tagService->getAll());
    }

}
