<?php
namespace App\Repositories;

use App\Password;
use App\Workspace;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

class PasswordRepository extends BaseRepository {

    public $model = Password::class;

    /**
     * create function.
     *
     * @param Workspace $workspace
     * @param           $password
     *
     * @return Password
     * @throws \Defuse\Crypto\Exception\BadFormatException
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     * @throws \TypeError
     */
    public function create(Workspace $workspace, $password): Password
    {
        $key = Key::loadFromAsciiSafeString($workspace->token);
        return $this->model()
            ->create([
                'workspace_id' => $workspace->id,
                'token'        => 'PW_' . str_random(48),
                'hash'         => Crypto::encrypt($password, $key)
            ]);
    }

    /**
     * find function.
     *
     * @param Workspace $workspace
     * @param           $token
     *
     * @return Password|null
     */
    public function find(Workspace $workspace, $token)
    {
        return $this->model()
            ->where('token', $token)
            ->where('workspace_id', $workspace->id)
            ->first();
    }

    public function model(): Password
    {
        return new Password();
    }

}