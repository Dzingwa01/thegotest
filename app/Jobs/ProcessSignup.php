<?php

namespace App\Jobs;

use App\BusinessPackage;
use App\Mail\BusinessSignup;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use App\Business;
use Illuminate\Support\Facades\Mail;

class ProcessSignup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $business;
    protected $user;
    public function __construct(User $user,Business $business)
    {
        //
        $this->user = $user;
        $this->business = $business;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $package = BusinessPackage::join('packages','packages.id','business_packages.package_id')->where('business_id',$this->business->id)->select('packages.*')->first();
        $email = new BusinessSignup($this->user,$this->business,$package);
        Mail::to($this->user->email)->send($email);
        $this->release(2);
    }
}
