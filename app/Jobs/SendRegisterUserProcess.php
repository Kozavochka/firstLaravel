<?php

namespace App\Jobs;

use App\Mail\SendRegisterUserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegisterUserProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $user;

    private $email;

    public function __construct($email,$user)//Объявление очереди
    {
        $this->user = $user;//получение текущего человека

        $this->email = $email;
    }

    //Исполняемый метод очереди
    public function handle()
    {
        //Отправка письма
        Mail::to($this->email)->send(new SendRegisterUserMail($this->user));
    }
}
