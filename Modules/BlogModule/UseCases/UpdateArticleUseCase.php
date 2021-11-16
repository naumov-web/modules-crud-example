<?php

namespace Modules\BlogModule\UseCases;

use App\DTO\BaseUseCaseResultDTO;
use Modules\BlogModule\DTO\ArticleInstanceUseCaseResultDTO;
use Modules\BlogModule\Entities\Article;

/**
 * Class UpdateArticleUseCase
 * @package Modules\BlogModule\UseCases
 */
final class UpdateArticleUseCase extends BaseArticlesUseCase
{
    /**
     * Article instance
     * @var Article
     */
    private Article $article;

    /**
     * New article data
     * @var array
     */
    private array $article_data;

    /**
     * Set article instance
     *
     * @param Article $article
     * @return $this
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }

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
        $article = $this->repository->update(
            $this->article,
            $this->article_data
        );

        return new ArticleInstanceUseCaseResultDTO($article);
    }
}
