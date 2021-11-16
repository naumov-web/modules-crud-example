<?php

namespace Modules\BlogModule\Http\Requests\Api\Articles;


use App\Http\Requests\Api\BaseApiRequest;

/**
 * Class UpdateArticleRequest
 * @package Modules\BlogModule\Http\Requests\Api\Articles
 */
final class UpdateArticleRequest extends BaseApiRequest
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
