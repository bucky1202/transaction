<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckBalance extends Command
{
    protected $signature = 'money:balance {user_id}';
    protected $description = 'Check the balance of a user account';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userId = $this->argument('user_id');

        $user = User::find($userId);

        if (!$user) {
            $this->error('User not found');
            return 1;
        }

        $this->info("User {$user->id} has a balance of {$user->balance}");

        return 0;
    }
}
