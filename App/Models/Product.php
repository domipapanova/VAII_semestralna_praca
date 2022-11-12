<?php

namespace App\Models;

use App\Core\Model;

class Product extends Model
{
    protected int $id_product;
    protected string $product_name;
    protected float $price;
    protected string $picture_name;
    protected ?int $category;



    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->id_product;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->id_product = $product_id;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->product_name;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPictureName(): string
    {
        return $this->picture_name;
    }

    /**
     * @param string $picture_name
     */
    public function setPictureName(string $picture_name): void
    {
        $this->picture_name = $picture_name;
    }

    /**
     * @return int|null
     */
    public function getCategory(): ?int
    {
        return $this->category;
    }

    /**
     * @param int|null $category
     */
    public function setCategory(?int $category): void
    {
        $this->category = $category;
    }

    static public function setDbColumns()
    {
        return [ 'id_product' ,'product_name', 'price', 'picture_name', 'category'];
    }

    static public function setTableName()
    {
        return 'products';
    }



}