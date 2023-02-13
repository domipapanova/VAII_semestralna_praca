<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\Pot;
use App\Models\Product;
use App\Models\Review;

class GalleryController extends AControllerBase
{

    public function authorize(string $action)
    {
        return true;
    }

    public function index(): Response
    {
        $products = Product::getAll();
        return  $this->html($products);
    }

    public function create()
    {
        return  $this->html([
            'product' => new Product()
        ], 'create');
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        $product = Product::getOne($id = $_GET['id']);
        $product->delete();

        return $this->redirect("?c=gallery");
    }

    public function edit()
    {
        return $this->html([
            'product' => Product::getOne($this->request()->getValue('id_product'))
        ],
            'create'
        );
    }
    /**
     * @return  \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $data = $this->request()->getPost();
        $id = $this->request()->getValue('id');
        $product = ($id ? Product::getOne($id) : new Product());

        if(isset($data['nazov']) && isset($data['cena'])) {
            if(strlen($data['nazov']) <= 200 && is_numeric($data['cena'])) {
                $product->setProductName($this->request()->getValue('nazov'));
                $product->setPrice($this->request()->getValue('cena'));

                if(isset($data['popis'])&& strlen($data['popis']) <= 1000 ) {
                    $product->setDescription($this->request()->getValue('popis'));
                }

                if (isset($_FILES['picture'])) {
                    $errors = [];
                    $file_name = $_FILES['picture']['name'];
                    $file_size = $_FILES['picture']['size'];
                    $file_tmp = $_FILES['picture']['tmp_name'];
                    $file_type = $_FILES['picture']['type'];
                    $file_info = pathinfo($_FILES['picture']['name']);
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
                        $product->setPictureName($file_name);
                    }
                }
                $product->save();
            }
        }
        return $this->redirect("?c=gallery");
    }

    /**
     * @throws \Exception
     */
    public function getProducts() : JsonResponse {
        return $this->json(Product::getAll());
    }
}