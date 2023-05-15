<?php

namespace App\Events;

use App\Jobs\SendMailProcess;
use App\Models\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendGameMail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $email;//мой email, в дальнейшем тут будет скорее всего пользователь
    public function __construct($game)
    {
        $email ="planchet2013@gmail.com";

        SendMailProcess::dispatch($email, $game);
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
