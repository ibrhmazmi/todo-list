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
            $social_user = Socialite::driver($social)->user();

            $user = User::where($social . '_id', $social_user->getId())->first();

            if (!$user) {
                //add log user as new user
                $user = User::create([
                    'full_name' => $user->getName(),
                    'email' => $user->getEmail(),
                    $social . '_id' => $user->id,
                    'avatar' => $user->avatar ?? '',
                ]);
            }
            Auth::login($user);
            // return redirect()->intended('/Dashboard');
            $token = $user->createToken('social')->plainTextToken;
            return redirect('/Dashboard?token=' . $token);
        } catch (\Throwable $e) {
            // dd('Something when wrong ! <br>' . $e);
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }
}
