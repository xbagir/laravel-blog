<?php

namespace App\Http\Controllers;

class CommentController extends ArticleBaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function storeArticle()
    {
        $articles = $this->articleService->paginate(5);

        return view('article.index', compact('articles'));
    }

}
