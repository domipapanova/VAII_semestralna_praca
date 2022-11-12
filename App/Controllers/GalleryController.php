<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Product;

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
}