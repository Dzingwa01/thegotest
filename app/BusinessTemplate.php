<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessTemplate extends Model
{
    //
    protected $fillable =['business_about_us','business_id','service_description','business_hours','logo_url','banner_url','with_banner'];

    public function business(){
        return $this->belongsTo(Business::class);
    }
}
