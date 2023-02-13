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

    public function create()
    {
        return  $this->html([
            'article' => new Article()
        ], 'create');
    }

    /**
     * @throws \Exception
     */
    public function store()
    {
        $data = $this->request()->getPost();
        $id = $this->request()->getValue('id');
        $article = ($id ? Article::getOne($id) : new Article());

        if(isset($data['title']) && isset($data['text'])) {
            if(strlen($data['title']) < 255 && strlen($data['text'])< 2000 ) {
                if (isset($_FILES['article_picture'])) {
                    $article->setTitle($this->request()->getValue('title'));
                    $article->setText($this->request()->getValue('text'));

                    if (isset($data['link'])) {
                        if (filter_var($data['link'], FILTER_VALIDATE_URL)) {
                            $article->setLinks($this->request()->getValue('link'));
                        }
                    }

                    $errors = [];
                    $file_name = $_FILES['article_picture']['name'];
                    $file_size = $_FILES['article_picture']['size'];
                    $file_tmp = $_FILES['article_picture']['tmp_name'];
                    $file_type = $_FILES['article_picture']['type'];
                    $file_info = pathinfo($_FILES['article_picture']['name']);
                    $file_ext = strtolower($file_info['extension']);

                    $extensions = ["jpeg", "jpg", "png", "webp"];
                    if (in_array($file_ext, $extensions) === false) {
                        $errors[] = "Nesprávny formát, povolené sú JPEG alebo PNG";
                    }

                    if ($file_size > 2097152) {
                        $errors[] = 'Veľkosť obrázka musí byť menšia než 2 MB';
                    }

                    if (empty($errors)) {
                        move_uploaded_file($file_tmp, "./public/images/" . $file_name);
                        // Store the path to the image in your database
                        // $img_path = "./public/images/" . $file_name;
                        $article->setPictureName($file_name);
                    }

                    $article->save();
                }
            }

            return $this->redirect("?c=blog");
        }
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        $article = Article::getOne($id = $_GET['id']);
        $article->delete();

        return $this->redirect("?c=blog");
    }

    public function edit()
    {
        return $this->html([
            'article' => Article::getOne($this->request()->getValue('id_article'))
        ],
            'create'
        );
    }
}