<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manage_bg;
class multiBackgroundController extends Controller
{
	public $data;
	public $ext_id;
    public function result($ext_id){
    	$this->data = Manage_bg::where('ext_id', base64_decode($ext_id))->get();

    	return response(array('data'=> $this->data),200);
    }
}
