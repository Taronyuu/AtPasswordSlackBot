<?php
namespace App\Repositories;

use App\Workspace;
use Defuse\Crypto\Key;

class WorkspaceRepository extends BaseRepository {

    /**
     * findOrCreate function.
     *
     * @param $workspaceId
     * @param $workspaceName
     *
     * @return Workspace
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     */
    public function findOrCreate($workspaceId, $workspaceName): Workspace
    {
        $workspace = $this->model()
            ->where('team_id', $workspaceId)
            ->first();

        if($workspace) return $workspace;

        return $this->model()
            ->create([
                'team_id' => $workspaceId,
                'team_domain' => $workspaceName,
                'token' => Key::createNewRandomKey()->saveToAsciiSafeString(),
            ]);
    }

    public function model(): Workspace
    {
        return new Workspace();
    }

}