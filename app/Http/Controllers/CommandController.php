<?php

namespace App\Http\Controllers;

use App\Workspace;
use App\Repositories\PasswordRepository;
use App\Repositories\WorkspaceRepository;
use Illuminate\Http\Request;
use App\Jobs\PasswordEncryptedJob;

class CommandController extends Controller
{
    /** @var WorkspaceRepository */
    protected $workspaceRepository;

    /** @var PasswordRepository */
    protected $passwordRepository;

    /**
     * @param WorkspaceRepository $workspaceRepository
     * @param PasswordRepository  $passwordRepository
     */
    public function __construct( WorkspaceRepository $workspaceRepository, PasswordRepository $passwordRepository ) {
        $this->workspaceRepository = $workspaceRepository;
        $this->passwordRepository  = $passwordRepository;
    }


    /**
     * slashPassword function.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Defuse\Crypto\Exception\BadFormatException
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     * @throws \TypeError
     * @throws \Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException
     */
    public function slashPassword(Request $request)
    {
        if(!$this->validateToken($request->get('token'))) {
            return response('Invalid token', 429);
        }

        $workspace = $this->workspaceRepository->findOrCreate(
            $request->get('team_id'),
            $request->get('team_domain')
        );

        // Check if we have to crypt or decrypt a password.
        if(starts_with(trim($request->get('text')), 'PW_')){
            return $this->decryptPasswordAndReply($request, $workspace);
        }

		$this->dispatch(new PasswordEncryptedJob($request->all()));
        
        return response(null, 200);
        
    }

    /**
     * decryptPasswordAndReply function.
     *
     * @param Request   $request
     * @param Workspace $workspace
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     * @throws \Defuse\Crypto\Exception\WrongKeyOrModifiedCiphertextException
     * @throws \TypeError
     */
    protected function decryptPasswordAndReply( Request $request, Workspace $workspace ) {
        $password = $this->passwordRepository->find(
            $workspace,
            trim($request->get('text'))
        );

        if(!$password){
            return response()->json([
                'text' => 'Unable to find your password. It most likely expired.',
                'response_type' => 'ephemeral',
            ]);
        }

        return response()->json([
            'text'  => 'Here is your decrypted password:',
            'response_type' => 'ephemeral',
            'attachments' => [
                [
                    'text'  => $password->decryptedPassword(),
                ]
            ]
        ]);
    }

    /**
     * validateToken function.
     *
     * @param $token
     *
     * @return bool
     */
    protected function validateToken( $token ): bool
    {
        return $token === env('SLACK_COMMAND_VERIFICATION_TOKEN');
    }
}
