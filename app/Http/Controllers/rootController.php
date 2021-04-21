<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rootController extends Controller
{
    public function result()
    {
    	
    	if (session()->has('username')) 
    	{
    		
    		return redirect('/dashboard');
			
    	}
    	else
    	{
    		return redirect('/login');
    	}
	}
}
