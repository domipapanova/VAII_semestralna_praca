<?php

namespace App\Models;

use App\Core\Model;

class Pot extends Model
{
    protected  $id_pot;
    protected  $name;
    protected  $describtion;
    protected  $color;
    protected  $price;
    protected  $picture_name;
    protected  $material;
    protected  $size;

    /**
     * @return mixed
     */
    public function getIdPot()
    {
        return $this->id_pot;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->describtion;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
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
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material): void
    {
        $this->material = $material;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    static public function setDbColumns()
    {
        return [ 'id_pot' ,'name','describtion', 'color','price', 'picture_name', 'material' , 'size'];
    }

    static public function setTableName()
    {
        return 'pots';
    }

    public static function getPkColumnName(): string
    {
        return 'id_pot';
    }

}