<?php

namespace App\Mail;

use App\Business;
use App\BusinessPackage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class BusinessSignup extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $business;
    protected $user;
    protected $package;
    public function __construct(User $user,Business $business,BusinessPackage $package)
    {
        //
        $this->user = $user;
        $this->business = $business;
        $this->package = $package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('emails.business_signup')
                    ->attach('http://thegotest.co.za/documents/thego_contract.pdf',[
                        'as'=>'contract.pd',
                        'mime'=>'application/pdf',
                    ])
                    ->with(['business'=>$this->business,
                        'user'=>$this->user,
                        'package'=>$this->package,
                        ]);
    }
}
