<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Workspace;
use App\Repositories\PasswordRepository;
use App\Repositories\WorkspaceRepository;
use Illuminate\Http\Request;
use App\Jobs\PasswordEncryptedJob;

class SlackController extends Controller
{
    private $state = 'installer';

    /** @var UserRepository */
    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct( UserRepository $userRepository ) {
        $this->userRepository = $userRepository;
    }

    /**
     * redirect function.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function redirect(Request $request)
    {
        return redirect('https://slack.com/oauth/authorize?client_id=' . env('SLACK_CLIENT_ID') . '&scope=commands&state=' . $this->state);
    }

    /**
     * oauth function.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function oauth(Request $request)
    {
        if(!$request->get('code')) abort(404);

        $data = [
            'client_id=' . env('SLACK_CLIENT_ID'),
            'client_secret=' . env('SLACK_APP_SECRET'),
            'code=' . $request->get('code'),
        ];

        /**
         * {"ok":true,"access_token":"xoxp-382476521873-382324241664-382480870801-45bda65d56df3f10c17b58de5b32b8cf","scope":"identify,commands","user_id":"UB89J73KJ","team_name":"Internetcode","team_id":"TB8E0FBRP"}
         */
        $response = file_get_contents('https://slack.com/api/oauth.access?' . implode('&', $data));
        $response = json_decode($response, true);
        if(!$response['ok']) {
            abort(403);
        }

        $this->userRepository->create($response);

        return redirect('/?success=1');
    }
}
