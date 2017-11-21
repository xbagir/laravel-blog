<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.06.2017
 * Time: 20:15
 */

namespace App\Dto;

class StoreArticleCommentDto extends BaseDto
{
    /** @var  int */
    protected $articleId;

    /** @var  string */
    protected $content;

    /** @var  int */
    protected $userId;

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @param int $articleId
     */
    public function setArticleId(int $articleId)
    {
        $this->articleId = $articleId;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }
}