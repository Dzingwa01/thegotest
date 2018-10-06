<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','user_name','contact_number','provider','provider_id','verified','verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function businesses(){
//        return $this->hasMany('App\Business','contact_person_id');
//    }

}
