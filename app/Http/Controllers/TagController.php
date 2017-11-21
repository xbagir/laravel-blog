<?php

namespace App\Http\Controllers;

class TagController extends ArticleBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param string $name
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $name)
    {
        $tag = $this->tagService->getByName($name);

        if ( ! $tag) abort(404);

        return view('tag.show', [
            'articles' => $tag->articles,
            'tag'      => $tag
        ]);
    }

}
