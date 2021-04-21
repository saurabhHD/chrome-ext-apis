<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_data;
class user_signup extends Controller
{
	public $data;
	public $password;
	public $temp;
	public $username;
    public function result(Request $request)
    {
    	$this->data = $request->all();
    	if($this->data['password'] == $this->data['con-password'])
    	{
    		$this->username = $this->data['username'];
    		$this->password = md5($this->data['password']);
    		$this->temp = array("password" => $this->password);
    		$this->data = array_replace($this->data, $this->temp);

    		if(User_data::create($this->data))
    		{
    			return redirect('/login');
    			
    		}
    		else
    		{
    			return redirect('/signup');
    		}
    	}
    	else
    	{
    		return redirect('/signup');
    	}
    	
    }
}
