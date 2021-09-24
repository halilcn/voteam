<?php

namespace App\Jobs;

use App\Mail\UserRegisterCode;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegisterCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::where('id', 1)->update(['name' => 'ahmet']);
        /*Mail::send("emails.users.register.code", [], function ($message) {
            $message->to("halilc.2001@gmail.com", "DENEME")->subject("DENEME MAİLİ");
        });*/
        /*$email = new UserRegisterCode();
        Mail::to('halilc.2001@gmail.com')->send($email);*/
        //(new UserRegisterCode());
    }
}
