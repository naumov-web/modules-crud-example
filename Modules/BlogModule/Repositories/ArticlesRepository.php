<?php

namespace Modules\BlogModule\Repositories;

use App\Repositories\BaseRepository;
use Modules\BlogModule\Entities\Article;

/**
 * Class ArticlesRepository
 * @package Modules\BlogModule\Repositories
 */
final class ArticlesRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Article::class;
    }
}
