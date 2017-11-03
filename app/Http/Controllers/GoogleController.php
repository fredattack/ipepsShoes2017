<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class GoogleController extends Controller
{

    /**
     * Redirect the user to the google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user();

        $findUser= \App\User::where('email',$user->getEmail())->first();
        if($findUser)
        {
            Auth::login($findUser);
        }
        else
        {
            $name=explode(" ", $user->getName());
            $newUser = new User();
            $newUser->firstName=$name[0];
            $newUser->lastName= $name[1];
            $newUser->email= $user->getEmail();
            $newUser->password=bcrypt('toBeConfirmed');
            $newUser->role='client';
            $newUser->save();
            Auth::login($newUser);

        }
        return redirect('/');
    }
}
