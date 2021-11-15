<?php

namespace App\Http\Resources\Api;

use Illuminate\Support\Collection;

/**
 * Class ListResource
 *
 * @package App\Http\Resources
 */
final class ListResource extends BaseApiResource
{

    /**
     * ListResource constructor.
     *
     * @param string $resource_class_name
     * @param Collection $items
     * @param int $count
     */
    public function __construct(string $resource_class_name, Collection $items, int $count)
    {
        parent::__construct([
            'success' => true,
            'items' => $resource_class_name::collection($items),
            'count' => $count,
        ]);
    }
}
