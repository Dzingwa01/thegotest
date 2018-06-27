<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $fillable = ["business_name","business_email","business_contact_number","business_address"];
}
