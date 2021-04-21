<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manage_shortcut;
class shortcutController extends Controller
{
	public $data;
	public $url;
    public function result(){
    	$this->url = url('/storage/');
    	$this->temp = array("url" => $this->url);
    	$this->data = Manage_shortcut::all();
    

    	
    	return response(array("data" => $this->data),200)->header("Content-Type","application/json");
    	
    }
}
