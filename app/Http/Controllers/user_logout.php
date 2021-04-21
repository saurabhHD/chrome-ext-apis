<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_logout extends Controller
{
    public function result()
    {
    	session()->forget('username');
    	if(!session()->has('username'))
    	{
    		return redirect('login');
    	}
    }
}
