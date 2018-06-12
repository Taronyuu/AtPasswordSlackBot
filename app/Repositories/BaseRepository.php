<?php
namespace App\Repositories;

use App\User;
use App\Workspace;
use App\Password;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

    abstract public function model();

    /**
     * delete function.
     *
     * @param Model $model
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

}