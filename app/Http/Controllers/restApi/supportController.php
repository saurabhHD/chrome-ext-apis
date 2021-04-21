<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manage_support;
class supportController extends Controller
{
	public $data;
	public $ext_id;
    public function result($ext_id)
    {
    	$this->ext_id = base64_decode($ext_id);

    	$this->data = Manage_support::where('ext_id', $this->ext_id)->get();

    	return response(array("data" => $this->data),200)->header('Content-Type', 'application/json');

    }
}
