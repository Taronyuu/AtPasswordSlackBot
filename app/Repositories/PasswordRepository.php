<?php
namespace App\Repositories;

use App\Password;
use App\Workspace;
use Carbon\Carbon;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Illuminate\Database\Eloquent\Collection;

class PasswordRepository extends BaseRepository {

    public $model = Password::class;

    /**
     * model function.
     *
     * @return Password
     */
    public function model(): Password
    {
        return new Password();
    }

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

    /**
     * getExpired function.
     *
     * @return Collection
     */
    public function getExpired(): Collection
    {
        return $this->model()
            ->where('created_at', '<', (new Carbon())->subDay())
            ->get();
    }

}