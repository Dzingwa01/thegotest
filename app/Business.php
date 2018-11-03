<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ["business_name","business_email","business_contact_number","business_address","business_type_id",'contact_person_id'];

    public function business_template(){
        $this->hasMany(BusinessTemplate::class,'business_id','id');
    }

    public function slides(){
        return $this->belongsToMany(Slide::class);
    }



}
