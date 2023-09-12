<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function dashboard()
    {
        return view('dashboard');
    }

    public function redirectToSocial($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleSocialCallback($social, Request $request)
    {

        try {
            $user = Socialite::driver($social)->user();

            $existing_user = User::where($social . '_id', $user->getId())->first();

            if (!$existing_user) {
                //add log user as new user
                $new_user = User::create([
                    'full_name' => $user->getName(),
                    'email' => $user->getEmail(),
                    $social . '_id' => $user->id,
                    'avatar' => $user->avatar ?? '',
                ]);
                Auth::login($new_user);
            } else {
                Auth::login($existing_user);
            }
            return redirect()->intended('/Dashboard');
        } catch (\Throwable $e) {
            dd('Something when wrong ! <br>' . $e);
        }
    }


}
