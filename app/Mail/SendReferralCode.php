<?php

namespace App\Mail;

use App\ReferralCode;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReferralCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $code;
    protected $user;
    public function __construct(User $user, ReferralCode $code)
    {
        //
        $this->user = $user;
        $this->code =$code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.referral_code')
            ->with([
                'user'=>$this->user,
                'code'=>$this->code,
            ]);
    }
}
