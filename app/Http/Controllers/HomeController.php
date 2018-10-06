<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Business;
use App\BusinessTemplate;
use App\BusinessType;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('super_admin')){
            return view('adminlte::home');
        }else{
            if($user->verified==0){
                return view('status.status_message_not_activated');
            }else{
                $user = Auth::user();
                $business = Business::where('contact_person_id',$user->id)->first();
                if(is_null($business)){
                    return view('adminlte::guest_home',compact('user'));
                }else{
                    $template = BusinessTemplate::where('business_id',$business->id)->first();
                    return view('business-portal.portal',compact('business','template'));
                }
            }

        }
    }

    public function getTCS(){

    }

    public function businessSignUp(){
        $user = Auth::user();
        $business = Business::where('contact_person_id',$user->id)->first();
        $types =  BusinessType::all();
        return view('bussiness.signup',compact('types','user','business'));
    }

    public function homeGuest()
    {

    }
}