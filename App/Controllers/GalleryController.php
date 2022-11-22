<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
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
        $product = Product::getOne($this->request()->getValue('id_product'));
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
            $product->setProductName($this->request()->getValue('nazov'));
            $product->setPrice($this->request()->getValue('cena'));
            /*$product->setCategory($this->request()->getValue('kategoria'));*/
            $product->setDescription($this->request()->getValue('popis'));
            if ($this->request()->getValue('obrazok') != null) {
                $product->setPictureName($this->request()->getValue('obrazok'));
            }

            $product->save();

        }
        return $this->redirect("?c=gallery");

    }
}