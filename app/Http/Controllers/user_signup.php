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
    public $otp;
    public $emailverify;
    public function result(Request $request)
    {
     
     if(count(User_data::all()) > 1) 
     {
         return response(array('notice' => 'already register'),401)->header('Content-Type','application/json');
     } 
     else
     {
        $this->otp = random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9);
        $this->data = $request->all();
        if($this->data['password'] == $this->data['con-password'])
        {
            $this->username = $this->data['username'];
            $this->emailverify =  User_data::where('username', $this->username)->get();
            
           
            if(count($this->emailverify) >0)
            {
                 return response(array('notice' => 'already register'),200)->header('Content-Type','application/json');
            }
            else
            {
                $this->password = md5($this->data['password']);
                $this->temp = array("password" => $this->password);
                $this->data = array_replace($this->data, $this->temp);
                $this->data['status']  = "pending";
                $this->data['otp']  = $this->otp;
                if(User_data::create($this->data))
                {
                    session()->put('username' ,$this->username);
                    return response(array('notice' => 'success'),200)->header('Content-Type','application/json');
                    
                }
                else
                {
                    return response(array('notice' => 'something went wrong'),401)->header('Content-Type','application/json');
                }
            }
            
        }
        else
        {
            return response(array('notice' => 'access denide'),401)->header('Content-Type','application/json');
        }
     } 
    	
    }
}
