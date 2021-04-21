<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_data;
class user_login extends Controller
{
	public $data;
	public $username;
	public $password;
    public function result(Request $request)
    {
    	$this->data = $request;
    	$this->username = $this->data['username'];
    	$this->password = md5($this->data['password']);
    	$this->data = User_data::where('username', $this->username)->limit(1)->get();
    	if($this->data[0]['password'] != '')
    	{
    		if($this->password == $this->data[0]['password'])
    		{
    			session()->put('username', $this->username);
    			
    			if(session()->has('username'))
    			{
    				return redirect('dashboard');
    			}
    			else
    			{
    				return redirect('login');
    			}
    			
    		}
    		else
    		{
    			return redirect('login');
    		}
    	}
    	else
    	{
    		return redirect('login');
    	}
    }
}
