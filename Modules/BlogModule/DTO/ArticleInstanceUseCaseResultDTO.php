<?php

namespace Modules\BlogModule\DTO;

use App\DTO\BaseUseCaseResultDTO;
use Modules\BlogModule\Entities\Article;

/**
 * Class ArticleInstanceUseCaseResultDTO
 * @package Modules\BlogModule\DTO
 */
final class ArticleInstanceUseCaseResultDTO extends BaseUseCaseResultDTO
{
    /**
     * Article instance
     * @var Article
     */
    private Article $article;

    /**
     * ArticleInstanceUseCaseResultDTO constructor
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;

        parent::__construct($success = true);
    }

    /**
     * Get article instance
     *
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }
}
