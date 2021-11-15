<?php

namespace Modules\BlogModule\Http\Controllers\Api;

use App\DTO\ListItemsUseCaseResultDTO;
use App\Http\Resources\Api\ListResource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Modules\BlogModule\DTO\ArticleInstanceDTO;
use Modules\BlogModule\Entities\Article;
use Modules\BlogModule\Http\Controllers\BaseController;
use Modules\BlogModule\Http\Requests\Api\Articles\CreateArticleRequest;
use Modules\BlogModule\Http\Requests\Api\Articles\GetArticlesRequest;
use Modules\BlogModule\Http\Resources\Api\Articles\ArticleDetailResource;
use Modules\BlogModule\Http\Resources\Api\Articles\ArticleResource;
use Modules\BlogModule\UseCases\CreateArticleUseCase;
use Modules\BlogModule\UseCases\DeleteArticleUseCase;
use Modules\BlogModule\UseCases\GetArticlesUseCase;

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
            'article' => new ArticleDetailResource($article_dto->getArticle())
        ]);
    }

    /**
     * Get articles request
     *
     * @param GetArticlesRequest $request
     * @return ListResource
     * @throws BindingResolutionException
     */
    public function index(GetArticlesRequest $request): ListResource
    {
        /**
         * @var GetArticlesUseCase $use_case
         */
        $use_case = app()->make(GetArticlesUseCase::class);
        /**
         * @var ListItemsUseCaseResultDTO $result_dto
         */
        $result_dto = $use_case
            ->setSelectionParams($request->only(['limit', 'offset', 'sort_by', 'sort_direction']))
            ->execute();
        $items_dto = $result_dto->getDTO();

        return new ListResource(
            ArticleResource::class,
            $items_dto->getModels(),
            $items_dto->getCount()
        );
    }

    /**
     * Delete existing article
     *
     * @param Article $article
     * @return JsonResponse
     * @throws BindingResolutionException
     */
    public function delete(Article $article): JsonResponse
    {
        /**
         * @var DeleteArticleUseCase $use_case
         */
        $use_case = app()->make(DeleteArticleUseCase::class);
        $result_dto = $use_case->setArticle($article)
            ->execute();

        return response()->json([
            'success' => $result_dto->getIsSuccess()
        ]);
    }
}
