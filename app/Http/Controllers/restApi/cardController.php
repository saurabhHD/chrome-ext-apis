<?php

namespace App\Http\Controllers\restApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
class cardController extends Controller
{
   	public $data;
    public function result(){
    	$this->data = Card::all('image_path','url');

    	return response(array('data' => $this->data),200)->header('Content-Type','application/json');
    }
}
