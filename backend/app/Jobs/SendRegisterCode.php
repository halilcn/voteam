<?php

namespace App\Jobs;

use App\Mail\UserRegisterCode;
use App\Models\UserRegisterCode as UserRegisterCodeModel;
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

    public $tries = 3;

    public $timeout = 60;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected UserRegisterCodeModel $userRegisterCode)
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
        Mail::to($this->userRegisterCode->email)->send(new UserRegisterCode($this->userRegisterCode->code));
    }
}
