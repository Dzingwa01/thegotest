<?php

namespace App\Http\Controllers\Auth;
use App\Jobs\SendVerificationEmail;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DB;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;
    protected $redirectTo = '/account_creation_success';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('adminlte::auth.register');
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'contact_number'=>'required',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function register(Request $request){
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        return  redirect($this->redirectTo);
    }
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contact_number' => $data['contact_number'],
            'password' => bcrypt($data['password']),
            'verified'=>0,
            'verification_token'=>base64_encode($data['email']),
        ]);
            $role = Role::where('name','guest_user')->first();
            $user->attachRole($role);
            DB::commit();
            event($user);
            dispatch(new SendVerificationEmail($user));

        }
        catch (\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();
        $user->verified = 1;
        if ($user->save()) {
            return view('emails.registration_success', ['user' => $user]);
        }
    }

    public function accountSuccess(){

        return view('status.status_message');
    }

    public function accountNotRegistered(){
        return view('status.status_message_not_activated');
    }
}
