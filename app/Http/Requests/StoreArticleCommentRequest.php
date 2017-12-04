<?php

namespace App\Http\Requests;

use App\Services\ArticleService;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(ArticleService $articleService)
    {
        $id = $this->post('articleId');

        return $articleService->existsById($id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|min:3',
        ];
    }
}
