<?php
namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository {

    public $model = User::class;

    /**
     * model function.
     *
     * @return User
     */
    public function model(): User
    {
        return new User();
    }

    /**
     * create function.
     *
     * @param array $data
     *
     * @return User
     */
    function create(array $data): User
    {
        return $this->model()
            ->create($data);
    }
}