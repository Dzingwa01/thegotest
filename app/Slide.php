<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name','description','active','duration'];

    public function businesses(){
        return $this->belongsToMany(Business::class);
    }
    public function business_templates(){
        return $this->hasManyThrough(BusinessTemplate::class,Business::class);
    }
}
