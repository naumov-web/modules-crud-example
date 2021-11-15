<?php

namespace App\UseCases;

use App\DTO\BaseUseCaseResultDTO;

/**
 * Class BaseUseCase
 * @package App\UseCases
 */
abstract class BaseUseCase
{
    /**
     * Execute use case
     * @return BaseUseCaseResultDTO
     */
    abstract public function execute(): BaseUseCaseResultDTO;
}
