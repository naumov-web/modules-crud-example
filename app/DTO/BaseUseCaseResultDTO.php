<?php

namespace App\DTO;

/**
 * Class BaseUseCaseResultDTO
 * @package App\DTO
 */
abstract class BaseUseCaseResultDTO
{
    /**
     * Flag if integration response is success
     * @var bool
     */
    protected bool $success;

    /**
     * BaseUseCaseResultDTO constructor.
     * @param bool $success
     */
    public function __construct(bool $success = true)
    {
        $this->success = $success;
    }

    /**
     * Get response success flag
     *
     * @return bool
     */
    public function getIsSuccess(): bool
    {
        return $this->success;
    }
}
