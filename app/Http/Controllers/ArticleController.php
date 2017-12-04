<?php

namespace App\Http\Controllers;

class ArticleController extends ArticleBaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->articleService->paginate(5);

        return view('article.index', compact('articles'));
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $article = $this->articleService->getById($id);

        if ( ! $article) {
            abort(404);
        }

        return view('article.show', compact('article'));
    }

}
