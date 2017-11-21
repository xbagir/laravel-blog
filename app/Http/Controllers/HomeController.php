<?php

namespace App\Http\Controllers;

use App\Contracts\ArticleRepositoryContract as ArticleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleRepository $articleRepository)
    {
        $data = $articleRepository->searchByTitle('do1');


        var_dump($data);
        die;
    }
}
