<?php

namespace Modules\BlogModule\Http\Resources\Api\Articles;

use App\Http\Resources\Api\BaseApiResource;
use Illuminate\Http\Request;

/**
 * Class ArticleResource
 * @package Modules\BlogModule\Http\Resources\Api\Articles
 */
final class ArticleResource extends BaseApiResource
{
    /**
     * Article content max length
     * @var int
     */
    public const CONTENT_MAX_LENGTH = 200;

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
            'content' => substr($this->content, 0, self::CONTENT_MAX_LENGTH),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
