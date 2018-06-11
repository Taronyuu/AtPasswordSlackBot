<?php

namespace App\Jobs;

use App\Repositories\PasswordRepository;
use App\Repositories\WorkspaceRepository;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RemovePasswordJob extends Job
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
     * @return void
     */
    public function handle()
    {
        $client = new Client();
        info(json_encode($this->request->get('response_url')));
        info(json_encode([
            'text'  => '',
            'response_type' => 'ephemeral',
            "replace_original" => true,
            "delete_original" => true,
        ]));
        $client->request('POST', $this->request->get('response_url'), [
        	'json'	=> [
	            'text'  => '',
	            'response_type' => 'ephemeral',
                "replace_original" => true,
                "delete_original" => true,
			]
    	]);

    }
}
