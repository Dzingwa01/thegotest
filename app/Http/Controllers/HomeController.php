<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

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
            return view('adminlte::guest_home',compact('user'));
        }
    }

    public function getTCS(){

    }

    public function businessSignUp(){
        $user = Auth::user();
//        dd($user);
        $types =  BusinessType::all();
        return view('bussiness.signup',compact('types','user'));
    }

    public function homeGuest()
    {

    }
}