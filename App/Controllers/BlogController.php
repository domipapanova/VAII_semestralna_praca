<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Article;

class BlogController extends AControllerBase
{

    public function index(): Response
    {
        $articles = Article::getAll();

        return $this->html($articles);
    }
}