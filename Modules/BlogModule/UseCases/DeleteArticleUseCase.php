<?php

namespace Modules\BlogModule\UseCases;

use App\DTO\BaseUseCaseResultDTO;
use App\DTO\SimpleUseCaseResultDTO;
use Modules\BlogModule\Entities\Article;

/**
 * Class DeleteArticleUseCase
 * @package Modules\BlogModule\UseCases
 */
final class DeleteArticleUseCase extends BaseArticlesUseCase
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
        return new SimpleUseCaseResultDTO(
            $this->repository->delete($this->article)
        );
    }
}
