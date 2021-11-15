<?php

namespace App\DTO;

/**
 * Class ListItemsUseCaseResultDTO
 * @package App\DTO
 */
final class ListItemsUseCaseResultDTO extends BaseUseCaseResultDTO
{
    /**
     * List items DTO instance
     * @var ListItemsDTO
     */
    private ListItemsDTO $dto;

    /**
     * ListItemsUseCaseResultDTO constructor
     * @param ListItemsDTO $dto
     */
    public function __construct(ListItemsDTO $dto)
    {
        $this->dto = $dto;

        parent::__construct($success = true);
    }

    /**
     * Get DTO instance
     *
     * @return ListItemsDTO
     */
    public function getDTO(): ListItemsDTO
    {
        return $this->dto;
    }
}
