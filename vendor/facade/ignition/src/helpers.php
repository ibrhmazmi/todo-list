<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('getId')) {
    function getId(){
        return Auth::user()->user_id;
    }
}
