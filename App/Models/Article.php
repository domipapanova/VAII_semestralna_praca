<?php

namespace App\Models;

use App\Core\Model;

class Article extends Model
{
    protected  $id_article;
    protected  $links;
    protected  $text;
    protected  $title;
    protected  $picture_name;

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article): void
    {
        $this->id_article = $id_article;
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param mixed $links
     */
    public function setLinks($links): void
    {
        $this->links = $links;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
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




    static public function setDbColumns()
    {
        return [ 'id_article' ,'links','text', 'title', 'picture_name'];
    }

    static public function setTableName()
    {
        return 'articles';
    }

    public static function getPkColumnName(): string
    {
        return 'id_article';
    }
}