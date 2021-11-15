<?php

namespace Modules\BlogModule\UseCases;

use App\DTO\BaseUseCaseResultDTO;
use Modules\BlogModule\DTO\ArticleInstanceDTO;
use Modules\BlogModule\Entities\Article;

/**
 * Class CreateArticleUseCase
 * @package Modules\BlogModule\UseCases;
 */
final class CreateArticleUseCase extends BaseArticlesUseCase
{
    /**
     * New article data
     * @var array
     */
    private array $article_data;

    /**
     * Set article data
     *
     * @param array $article_data
     * @return $this
     */
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
