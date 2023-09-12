<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();

        $user->tokens->each(function (PersonalAccessToken $token) {
            $token->delete();
        });
        request()->session()->flush();
        // Auth::logout(); // Log out the user

        return redirect('/'); // Redirect to the home route
    }
}
