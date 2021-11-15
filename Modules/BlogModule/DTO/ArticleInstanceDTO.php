<?php

namespace Modules\BlogModule\DTO;

use App\DTO\BaseUseCaseResultDTO;
use Modules\BlogModule\Entities\Article;

/**
 * Class ArticleInstanceDTO
 * @package Modules\BlogModule\DTO
 */
final class ArticleInstanceDTO extends BaseUseCaseResultDTO
{
    /**
     * Article instance
     * @var Article
     */
    private Article $article;

    /**
     * ArticleInstanceDTO constructor
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
