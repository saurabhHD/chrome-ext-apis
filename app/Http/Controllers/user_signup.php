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
        
    	$this->data = User_data::all();
        if(count($this->data) > 1)
        {
            return response(array("data" => "You can't register with us"),401)->header('Content-Type','application/json');
        }
        elseif(count($this->data) == 0)
        {
                $this->data = $request->all();
            if($this->data['password'] == $this->data['con-password'])
            {
                $this->temp = array("password" => md5($this->data['password']));
                $this->data = array_replace($this->data, $this->temp);
                if(User_data::create($this->data))
               {
                session()->put("username", $this->data['username']);
                 return response(array("data" => "success"),200)->header('Content-Type','application/json');
               }
               else
               {
                 return response(array("data" => "something went wrong"),401)->header('Content-Type','application/json');
               }
            }
            else
            {
               return response(array("data" => "password must be same"),200)->header('Content-Type','application/json');
             }
        }
    }
}
