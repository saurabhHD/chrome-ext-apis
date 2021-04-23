<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_data extends Model
{
    protected $fillable = ['name','username','password','status','otp'];
}
