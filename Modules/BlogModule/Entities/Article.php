<?php

namespace Modules\BlogModule\Entities;

use App\Models\BaseModel;

/**
 * Class Article
 * @package Modules\BlogModule\Entities
 *
 * @property-read int $id
 * @property string $title
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
final class Article extends BaseModel
{
}
