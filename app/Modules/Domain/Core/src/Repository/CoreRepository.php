<?php

namespace Logistic\Modules\Domain\Core\src\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class CoreRepository implements CoreInterface
{
    protected Model $model;

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * Get the model class name
     */
    abstract protected function model(): string;

    /**
     * Create and set the model instance
     */
    protected function makeModel(): void
    {
        $modelClass = $this->model();

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Class {$modelClass} does not exist");
        }

        $model = new $modelClass;

        if (!$model instanceof Model) {
            throw new \InvalidArgumentException("Class {$modelClass} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        $this->model = $model;
    }

    // ... keep all other methods the same
    public function all(array $columns = ['*']): Collection
    {
        return $this->model->select($columns)->get();
    }

    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    public function paginate(
        int $perPage = 15,
        array $columns = ['*'],
        string $pageName = 'page',
        int $page = null
    ): LengthAwarePaginator {
        return $this->model->select($columns)->paginate($perPage, $columns, $pageName, $page);
    }

    public function find(int|string $id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }

    public function findOrFail(int|string $id, array $columns = ['*']): Model
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int|string $id, array $data): Model
    {
        $record = $this->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete(int|string $id): bool
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }
        return (bool) $record->delete();
    }

    public function beginTransaction(): void
    {
        DB::beginTransaction();
    }

    public function commit(): void
    {
        DB::commit();
    }

    public function rollBack(): void
    {
        DB::rollBack();
    }
}
