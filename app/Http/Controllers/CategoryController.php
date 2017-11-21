<?php

namespace App\Http\Controllers;

class CategoryController extends ArticleBaseController
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $category = $this->categoryService->getById($id);

        if ( ! $category) abort(404);

        return view('category.show', [
            'articles' => $category->articles,
            'category' => $category
        ]);
    }
}