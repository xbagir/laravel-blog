<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.06.2017
 * Time: 22:49
 */

namespace App\Dto;

use App\Traits\PropertyAccessTrait;
use Illuminate\Http\Request;

abstract class BaseDto
{
    use PropertyAccessTrait;

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public static function fromRequest(Request $request)
    {
        return (new static)->fromArray($request->all());
    }
}