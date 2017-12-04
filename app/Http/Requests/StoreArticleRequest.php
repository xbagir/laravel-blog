<?php

namespace App\Http\Requests;

use App\Services\ArticleService;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categoryId' => 'required|exists:categories,id',
            'title'      => 'required|string',
            'subtitle'   => 'required|string',
            'content'    => 'required|string',
            'tags'       => 'required|string',
            'image'      => 'string|url',
        ];
    }
}
