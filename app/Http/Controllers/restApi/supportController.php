<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manage_support;
class supportController extends Controller
{
	public $data;
	public $ext_id;
    public function result()
    {
    	

    	$this->data = Manage_support::all();

    	return response(array("data" => $this->data),200)->header('Content-Type', 'application/json');

    }
}
