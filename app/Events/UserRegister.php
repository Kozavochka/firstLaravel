<?php

namespace App\Events;

use App\Jobs\SendRegisterUserProcess;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegister
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $email;
    public function __construct($user)//Создание event
    {
        $email ="planchet2013@gmail.com";
        //Что вызывает событие(job):
        SendRegisterUserProcess::dispatch($email, $user);
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
