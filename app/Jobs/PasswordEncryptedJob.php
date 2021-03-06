<?php

namespace App\Jobs;

use App\Repositories\PasswordRepository;
use App\Repositories\WorkspaceRepository;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PasswordEncryptedJob extends Job
{
	protected $request;

    /**
     * Create a new job instance.
     *
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = collect($request);
    }

    /**
     * Execute the job.
     *
     * @param PasswordRepository  $passwordRepository
     * @param WorkspaceRepository $workspaceRepository
     *
     * @return void
     * @throws \Defuse\Crypto\Exception\BadFormatException
     * @throws \Defuse\Crypto\Exception\EnvironmentIsBrokenException
     * @throws \TypeError
     */
    public function handle(PasswordRepository $passwordRepository, WorkspaceRepository $workspaceRepository)
    {
	    $workspace = $workspaceRepository->findOrCreate(
            $this->request->get('team_id'),
            $this->request->get('team_domain')
        );
        
        $password = $passwordRepository->create(
            $workspace,
            $this->request->get('text')
        );
        
        $client = new Client();
        $client->request('POST', $this->request->get('response_url'), [
        	'json'	=> [
	            'text'  => '<@' . $this->request->get('user_id') . '> shared a new password, use the following command to see the password:',
	            'response_type' => 'in_channel',
	            'attachments' => [
	                [
	                    'text' => '/password ' . $password->token . '',
	                ]
				]
			]
    	]);
    }
}
