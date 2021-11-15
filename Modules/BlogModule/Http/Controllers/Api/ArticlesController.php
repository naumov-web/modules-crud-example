<?php

namespace Modules\BlogModule\Http\Controllers\Api;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Modules\BlogModule\DTO\ArticleInstanceDTO;
use Modules\BlogModule\Http\Controllers\BaseController;
use Modules\BlogModule\Http\Requests\Api\Articles\CreateArticleRequest;
use Modules\BlogModule\Http\Resources\Api\Articles\ArticleResource;
use Modules\BlogModule\UseCases\CreateArticleUseCase;

/**
 * Class ArticlesController
 * @package Modules\BlogModule\Http\Controllers\Api
 */
final class ArticlesController extends BaseController
{
    /**
     * Handle request for creation of new article
     *
     * @param CreateArticleRequest $request
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function create(CreateArticleRequest $request): JsonResponse
    {
        /**
         * @var CreateArticleUseCase $use_case
         */
        $use_case = app()->make(CreateArticleUseCase::class);

        /**
         * @var ArticleInstanceDTO $article_dto
         */
        $article_dto = $use_case
            ->setArticleData($request->only(['title', 'content']))
            ->execute();

        return response()->json([
            'success' => true,
            'article' => new ArticleResource($article_dto->getArticle())
        ]);
    }
}
