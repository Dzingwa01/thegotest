<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    //
    protected $fillable = ['feature_name','feature_description'];

    public function packages(){
        return $this->belongsToMany(Package::class,'features')->withTimestamps();
    }
}
