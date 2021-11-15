<?php

namespace Modules\BlogModule\Http\Requests\Api\Articles;

use App\Http\Requests\Api\BaseListRequest;

/**
 * Class GetArticlesRequest
 * @package Modules\BlogModule\Http\Requests\Api\Articles
 */
final class GetArticlesRequest extends BaseListRequest
{
    /**
     * Define validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        $sortable_columns = [
            'id',
            'title',
            'created_at',
            'updated_at'
        ];

        return $this->composeListRules($sortable_columns);
    }
}
