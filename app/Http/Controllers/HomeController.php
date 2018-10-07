<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Business;
use App\BusinessPackage;
use App\BusinessTemplate;
use App\BusinessType;
use App\Feature;
use App\Http\Requests;
use App\Package;
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
                $business = Business::where('contact_person_id',$user->id)->first();
                if(is_null($business)){
                    return view('adminlte::guest_home',compact('user'));
                }else{
                    $template = BusinessTemplate::where('business_id',$business->id)->first();
                    if(is_null($template)){
                        return view('adminlte::guest_home',compact('user'));
                    }else{
                        $business = Business::where('contact_person_id',$user->id)->first();
                        $template = BusinessTemplate::where('business_id',$business->id)->first();
                        $package = BusinessPackage::join('packages','packages.id','business_packages.package_id')
                                ->where('business_id',$business->id)->first();
                        $package_features = Feature::join('package_features','package_features.id','features.package_feature_id')->where('package_id',$package->id)
                            ->get();
                        return view('business-portal.portal',compact('business','template','package','package_features'));
                    }

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