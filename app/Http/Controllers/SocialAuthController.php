<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

class SocialAuthController extends Controller
{
    protected $redirectTo = '/home';
    use AuthenticatesUsers;
    //
    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        $user = $this->findOrCreateUser($user, $provider);
//        dd($user);
        Auth::login($user);

        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->orWhere('email',$user->email)->first();
//        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }else{
            $user = User::create([
                'name'     => $user->name,
                'email'    => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                'avatar' =>$user->avatar,
                'password'=>bcrypt("thego123")
            ]);
            $role = Role::where('name','guest_user')->first();
            $user->attachRole($role);
            return $user;
        }

    }
}
