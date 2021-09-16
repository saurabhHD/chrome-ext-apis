<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manage_game;
class gameController extends Controller
{
	public $data;
    public function result(){
    	$this->data = Manage_game::all('title','url','image_path','category');

    	return response(array('data' => $this->data),200)->header('Content-Type','application/json');
    }
}
