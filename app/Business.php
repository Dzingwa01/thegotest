<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ["business_name","business_email","business_contact_number","business_address","business_type_id",'contact_person_id'];

    public function businessTemplate(){
        $this->hasMany('App\BusinessTemplate','business_id');
    }
}
