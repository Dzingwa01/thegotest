<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReferralCode extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['email_address','generated_code'];
}
