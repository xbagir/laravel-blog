<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.06.2017
 * Time: 20:15
 */

namespace App\Dto;

class StoreDiscussionCommentDto extends BaseDto
{
    /** @var  int */
    protected $userId;

    /** @var  int */
    protected $discussionId;

    /** @var  string */
    protected $content;

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

    /**
     * @return int
     */
    public function getDiscussionId(): int
    {
        return $this->discussionId;
    }

    /**
     * @param int $discussionId
     */
    public function setDiscussionId(int $discussionId)
    {
        $this->discussionId = $discussionId;
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

}