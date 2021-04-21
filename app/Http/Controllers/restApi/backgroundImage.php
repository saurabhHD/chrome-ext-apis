<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manage_bg;
class backgroundImage extends Controller
{

	public $ext_id;
	public $data;
	public function result($ext_id)
	{
		$this->ext_id = base64_decode($ext_id);
		$this->data = Manage_bg::where('ext_id',$this->ext_id)->inRandomOrder()->limit(1)->get('image_path');
		$this->data = $this->data[0]['image_path'];
		$this->data =  url("/storage/".$this->data);
		return response(array('data' => $this->data),200)->header('Content-Type', 'application/json');
	}
    
}
