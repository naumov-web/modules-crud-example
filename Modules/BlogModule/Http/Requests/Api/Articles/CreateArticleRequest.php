<?php

namespace Modules\BlogModule\Http\Requests\Api\Articles;

use App\Http\Requests\Api\BaseApiRequest;

/**
 * Class CreateArticleRequest
 * @package Modules\BlogModule\Http\Requests\Api\Articles
 */
final class CreateArticleRequest extends BaseApiRequest
{
    /**
     * Define validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:200'
            ],
            'content' => [
                'required',
                'string'
            ]
        ];
    }
}
