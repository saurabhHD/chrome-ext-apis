<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data;
    public $image_name;
    public $temp;
    public function index()
    {
        $this->data = Card::all();
        return response(array('data' => $this->data),200)->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->data = $request;
        $this->data = $this->data->all();
        $this->image_name = $request->file('image_path')->getClientOriginalName();
        if($request->file('image_path')->storeAs('public/card/' , $this->image_name))
        {
             
            $this->temp = array("image_path" => "card/".$this->image_name);
            $this->data = array_replace($this->data, $this->temp);
            if(Card::create($this->data))
            {
                return response(array('data' => "success"),200)->header('Content-Type', 'application/json');
                
            }
            else
            {
                 return response(array('data' => "faild"),401)->header('Content-Type', 'application/json');
            }
        }
        else
        {
             return response(array('data' => "faild"),401)->header('Content-Type', 'application/json');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->data = Card::find($id);
        $this->image_name =  $this->data->all()[0]['image_path'];

        if(File::delete('storage/'.$this->image_name))
        {
            if($this->data->delete())
            {
                 return response(array('data' => "SUCCESS"),200)->header('Content-Type', 'application/json');
            }
            else
            {
                 return response(array('data' => "faild"),401)->header('Content-Type', 'application/json');
            }
        }
        else
        {
             return response(array('data' => "faild"),401)->header('Content-Type', 'application/json');
        }

    }
}
