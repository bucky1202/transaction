<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SendMoney extends Command
{
    protected $signature = 'money:send {sender_id} {receiver_id} {amount}';
    protected $description = 'Send money from one user to another';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $senderId = $this->argument('sender_id');
        $receiverId = $this->argument('receiver_id');
        $amount = $this->argument('amount');

        // Validate amount
        if (!is_numeric($amount) || $amount <= 0) {
            $this->error('The amount must be a positive number.');
            return 1;
        }

        $sender = User::find($senderId);
        $receiver = User::find($receiverId);

        if (!$sender) {
            $this->error('Sender user not exists');
            return 1;
        }

        if (!$receiver) {
            $this->error('Receiver user not exists');
            return 1;
        }

        if ($sender->balance < $amount) {
            $this->error("Your balance is $sender->balance and sending amount is $amount ! We can not do this operation!");
            return 1;
        }

        $sender->balance -= $amount;
        $receiver->balance += $amount;

        $sender->save();
        $receiver->save();

        $this->info("Sent $amount from user {$sender->id} to user {$receiver->id}.");
        $this->info("New balance for sender {$sender->id}: {$sender->balance}");
        $this->info("New balance for receiver {$receiver->id}: {$receiver->balance}");

        return 0;
    }
}
