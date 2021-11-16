<?php

namespace Modules\BlogModule\UseCases;

use App\DTO\BaseUseCaseResultDTO;
use Modules\BlogModule\DTO\ArticleInstanceUseCaseResultDTO;
use Modules\BlogModule\Entities\Article;

/**
 * Class ShowArticleUseCase
 * @package Modules\BlogModule\UseCases
 */
final class ShowArticleUseCase extends BaseArticlesUseCase
{

    /**
     * Article instance
     * @var Article
     */
    private Article $article;

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
     * @inheritDoc
     */
    public function execute(): BaseUseCaseResultDTO
    {
        return new ArticleInstanceUseCaseResultDTO($this->article);
    }
}
