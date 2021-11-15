<?php

namespace App\Repositories;

use App\DTO\IndexDTO;
use App\DTO\ListItemsDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository
{
    /**
     * Get model class name
     *
     * @return string
     */
    protected abstract function getModelClass(): string;

    /**
     * Apply pagination to query
     *
     * @param Builder $query
     * @param IndexDTO $data
     * @return Builder
     */
    protected function applyPagination(Builder $query, IndexDTO $data): Builder
    {
        if ($data->getLimit()) {
            $query->limit($data->getLimit());
        }

        if ($data->getOffset()) {
            $query->offset($data->getOffset());
        }

        return $query;
    }

    /**
     * Apply default sorting
     *
     * @param Builder $query
     * @param IndexDTO $data
     * @return Builder
     */
    protected function applyDefaultSorting(Builder $query, IndexDTO $data): Builder
    {
        if ($data->getSortBy() && $data->getSortDirection()) {
            $query->orderBy($data->getSortBy(), $data->getSortDirection());
        }

        return $query;
    }

    /**
     * Get count and list of items
     *
     * @param IndexDTO|null $data
     * @return ListItemsDTO
     */
    public function index(IndexDTO $data = null): ListItemsDTO
    {
        $model_class = $this->getModelClass();
        /**
         * @var Builder $query
         */
        $query = $model_class::query();

        $count = $query->count();

        if ($data) {
            $query = $this->applyPagination($query, $data);
            $query = $this->applyDefaultSorting($query, $data);
        }

        return new ListItemsDTO($query->get(), $count);
    }

    /**
     * Store new model to database
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        $model_class = $this->getModelClass();

        /**
         * @var Model $model
         */
        $model = new $model_class();
        $model->fill($data);
        $model->save();

        return $model;
    }

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @param bool $update_timestamps
     * @return Model
     */
    public function update(Model $model, array $data, bool $update_timestamps = true): Model
    {
        if (!$update_timestamps) {
            $model->timestamps = false;
        }

        $model->update($data);
        $model->refresh();

        return $model;
    }

    /**
     * Get detailed model info
     *
     * @param Model $model
     * @return Model
     */
    public function show(Model $model): Model
    {
        return $model;
    }

    /**
     * Delete model
     *
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
