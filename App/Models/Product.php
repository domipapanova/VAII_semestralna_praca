<?php

namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    protected  $id_product;
    protected  $product_name;
    protected  $price;
    protected  $picture_name;
    protected  $category;
    protected $description;

    /**
     * @return mixed
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * @param mixed $id_product
     */
    public function setIdProduct($id_product): void
    {
        $this->id_product = $id_product;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPictureName()
    {
        return $this->picture_name;
    }

    /**
     * @param mixed $picture_name
     */
    public function setPictureName($picture_name): void
    {
        $this->picture_name = $picture_name;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }



    static public function setDbColumns()
    {
        return [ 'id_product' ,'product_name', 'price', 'picture_name', 'category' , 'description'];
    }

    static public function setTableName()
    {
        return 'products';
    }

    public static function getPkColumnName(): string
    {
        return 'id_product';
    }



}