<?php

namespace Modules\BlogModule\Http\Resources\Api\Articles;

use App\Http\Resources\Api\BaseApiResource;
use Illuminate\Http\Request;

/**
 * Class ArticleDetailResource
 * @package Modules\BlogModule\Http\Resources\Api\Articles
 */
final class ArticleDetailResource extends BaseApiResource
{
    /**
     * Convert object to array
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
