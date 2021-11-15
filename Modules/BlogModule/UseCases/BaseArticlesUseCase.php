<?php

namespace Modules\BlogModule\UseCases;

use App\UseCases\BaseUseCase;
use Modules\BlogModule\Repositories\ArticlesRepository;

/**
 * Class BaseArticlesUseCase
 * @package Modules\BlogModule\UseCases
 */
abstract class BaseArticlesUseCase extends BaseUseCase
{
    /**
     * Articles repository instance
     * @var ArticlesRepository
     */
    protected ArticlesRepository $repository;

    /**
     * CreateArticleUseCase constructor
     * @param ArticlesRepository $repository
     */
    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }
}
