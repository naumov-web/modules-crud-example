<?php

namespace Modules\BlogModule\UseCases;

use App\DTO\BaseUseCaseResultDTO;
use App\DTO\IndexDTO;
use App\DTO\ListItemsUseCaseResultDTO;

/**
 * Class GetArticlesUseCase
 * @package Modules\BlogModule\UseCases
 */
final class GetArticlesUseCase extends BaseArticlesUseCase
{
    /**
     * Selection parameters
     * @var array
     */
    private array $selection_params;

    /**
     * Set selection params
     *
     * @param array $selection_params
     * @return $this
     */
    public function setSelectionParams(array $selection_params): self
    {
        $this->selection_params = $selection_params;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function execute(): BaseUseCaseResultDTO
    {
        $index_dto = (new IndexDTO())->fill($this->selection_params);

        return new ListItemsUseCaseResultDTO(
            $this->repository->index($index_dto)
        );
    }
}
