<?php

namespace Modules\BlogModule\UseCases;

use App\DTO\BaseUseCaseResultDTO;
use App\UseCases\BaseUseCase;
use Modules\BlogModule\DTO\ArticleInstanceDTO;
use Modules\BlogModule\Entities\Article;
use Modules\BlogModule\Repositories\ArticlesRepository;

/**
 * Class CreateArticleUseCase
 * @package Modules\BlogModule\UseCases;
 */
final class CreateArticleUseCase extends BaseUseCase
{

    private array $article_data;

    private ArticlesRepository $repository;

    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function setArticleData(array $article_data): self
    {
        $this->article_data = $article_data;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function execute(): BaseUseCaseResultDTO
    {
        /**
         * @var Article $article
         */
        $article = $this->repository->store($this->article_data);

        return new ArticleInstanceDTO($article);
    }
}
