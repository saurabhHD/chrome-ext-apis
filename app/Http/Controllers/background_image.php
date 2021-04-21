<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manage_bg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class background_image extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public $file;
    public $filename;
    public $ext_id;
    public $temp;
    public $random;
    public function index()
    {
        //
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
        $this->data = $request->all();
        $this->file  = $request->file('image_path');
        $this->random = random_int(1, 10000);
        $this->filename = $this->random."_".$this->file->getClientOriginalName();
        if($this->file->storeAs('public',$this->filename))
        {
            $this->temp = array('image_path'=> $this->filename);
            $this->data = array_replace($this->data, $this->temp);
            if(Manage_bg::create($this->data))
            {
              return response(array("data"=>"success"),200)->header('Content-Type','application/json');  
            }
            else
            {
                return response(array("data"=>"Faild"),401)->header('Content-Type','application/json'); 
            }
        }
        else
        {
             return response(array("data"=>"rename your photo"),401)->header('Content-Type','application/json'); 
        }
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data = Manage_bg::where('ext_id', $id)->get()->all('id','image_path');
       return response(array("data"=> $this->data),200)->header('Content-Type','application/json'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
        $this->data = Manage_bg::find($id);
        $this->temp = $this->data;
        $this->temp = $this->temp->all('image_path');
        $this->temp = $this->temp[0]['image_path'];
        if($this->data->delete())
        {
                if( File::delete('storage/'.$this->temp))
                {
                    return response(array('data' => 'success'),200)->header('Content-Type','application/json');
                }
                else
                {
                    return response(array('data' => 'faild'),200)->header('Content-Type','application/json');
                }
            

            
        }
        else
        {
             return response(array('data' => $this->temp),404)->header('Content-Type','application/json');
        }
    }
}
