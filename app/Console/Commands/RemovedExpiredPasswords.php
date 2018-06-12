<?php

namespace App\Console\Commands;

use App\Repositories\PasswordRepository;
use Illuminate\Console\Command;

class RemovedExpiredPasswords extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:remove-expired';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes all the expired passwords.';

    /** @var \App\Repositories\PasswordRepository */
    protected $passwordRepository;

    /**
     * @param \App\Repositories\PasswordRepository $passwordRepository
     */
    public function __construct( PasswordRepository $passwordRepository ) {
        parent::__construct();

        $this->passwordRepository = $passwordRepository;
    }

    public function handle()
    {
        $passwords = $this->passwordRepository->getExpired();
        foreach($passwords as $password){
            $this->passwordRepository->delete($password);
        }
    }
}