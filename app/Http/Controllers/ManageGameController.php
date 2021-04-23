<?php

namespace App\Http\Controllers;

use App\Manage_game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ManageGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data;
    public $fileinfo;
    public $temp;
    public $filename;
    public $random;
    public function index()
    {
        if($this->data = Manage_game::get()->all())
        {
            return response(array('data' => $this->data),200)->header('Content-Type','application/json');
        }
        else
        {
            return response(array('notice' => 'faild'),401)->header('Content-Type','application/json');
        }

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
        $this->random = random_int(10, 10000);
        $this->data = $request;
        $this->data = $this->data->all();
        $this->fileinfo = $request->file('image_path');
        $this->filename = $this->random."--".$this->fileinfo->getClientOriginalName();
        if($this->fileinfo->storeAs('public/game',$this->filename))
        {
            $this->temp = array('image_path' => 'game/'.$this->filename);
            $this->data = array_replace($this->data, $this->temp);
            if(Manage_game::create($this->data))
            {
                return response(array('notice'=> 'success'),200)->header('Content-Type', 'application/json');
            }
            else
            {
                  return response(array('notice'=> 'faild'),401)->header('Content-Type', 'application/json');
            }
        }
        else
        {
                  return response(array('notice'=> 'faild'),401)->header('Content-Type', 'application/json');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manage_game  $manage_game
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manage_game  $manage_game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manage_game  $manage_game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->data = Manage_game::find($id);
        $this->data->update($request->all());
         return response(array('notice'=> 'success'),200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manage_game  $manage_game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->data = Manage_game::find($id);
        $this->filename =  $this->data->all('image_path')[0]['image_path'];
        if($this->data->delete())
        {
            if(File::delete('storage/'.$this->filename))
            {
                 return response(array('notice'=> 'success'),200)->header('Content-Type', 'application/json');
            }
            else
            {
                 return response(array('notice'=> 'faild'),401)->header('Content-Type', 'application/json');
            }
        }
        else
        {
             return response(array('notice'=> 'faild'),401)->header('Content-Type', 'application/json');
        }

    }
}