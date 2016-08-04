<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    protected $redirectTo = '/user';
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request)
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $socUser = Socialite::driver('github')->user();
        $user=User::where(['email'=>$socUser->email])->first();
        // $user->token;
        if(is_null($user)){
            $user=User::create([
               'first_name'=>$socUser->user['login'],
                'email'=>$socUser->email
            ]);
        }
        Auth::login($user);
        return redirect($this->redirectTo.'/'.$user->id);
    }
}
