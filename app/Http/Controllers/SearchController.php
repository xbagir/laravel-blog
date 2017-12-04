<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends ArticleBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $title    = $request->get('q');
        $articles = $this->articleService->searchByTitle($title);

        return view(
            'search.show',
            [
                'articles' => $articles,
                'q'        => $title,
            ]
        );
    }


}
