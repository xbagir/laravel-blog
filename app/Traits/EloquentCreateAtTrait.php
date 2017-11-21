<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.07.2017
 * Time: 14:04
 */

namespace App\Traits;

trait EloquentCreateAtTrait
{
    /**
     * Get the created at attribute.
     *
     * @param $value
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }
}