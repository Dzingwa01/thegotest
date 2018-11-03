<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['package_name','package_description','package_price','active','duration'];

    public function package_features(){
        $this->belongsToMany(PackageFeature::class,'features')->withTimestamps();
    }
}
