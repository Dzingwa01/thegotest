<?php

namespace App\Jobs;

use App\ReferralCode;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendReferralCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $code;

    public function __construct(User $user,ReferralCode $code)
    {
        //
        $this->user = $user;
        $this->code =$code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new \App\Mail\SendReferralCode($this->user,$this->code);
        Mail::to($this->user->email)->send($email);
        $this->release(2);
    }
}
