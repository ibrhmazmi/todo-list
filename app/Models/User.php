<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'full_name',
        'email',
        'Facebook_id',
        'Github_id',
        'Google_id',
        'avatar'
    ];

}
