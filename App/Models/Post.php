<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected ?int $id = 0;
    protected ?string $text = "";
    protected ?string $title = "";

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function delete()
    {
        Model::getConnection()->beginTransaction();
        Like::deleteLikes($this->id);
        parent::delete();
        Model::getConnection()->commit();
    }

    /**
     * @return Like[]|array
     * @throws \Exception
     */
    public function getLikes()
    {
        if (!$this->getId()) {
            return [];
        }
        return Like::getAll("post_id = ? ", [$this->getId()]);
    }
}