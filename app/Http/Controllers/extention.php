<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manage_ext;
use App\Manage_bg;
use App\Manage_support;
use Illuminate\Support\Facades\File;
class extention extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public $temp_key;
    public $extname;
    public $image_path;
    public $temp;
    public $main_data;
    public $i;
    public $notice;
    public $url;
    public $api;
    public function index(Request $request)
    {

        if($request->ajax())
        {
            $this->data = Manage_ext::all('id','ext_name');

             return response(array('data' => $this->data), 200)->header('Content-Type','application/json');
        }
        else
        {
            
            return response(array('data' => 'Access Deaide !'), 401)->header('Content-Type','application/json');
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
         $this->url = url('/');
        $this->data = $request->all();
        $this->temp_key = $this->data['ext_name'];
        $this->extname = Manage_ext::where("ext_name",$this->temp_key )->get();
        if(count($this->extname) != 0)
        {
            return response(array("data" => "this name already exits"),401)->header('Content-Type', 'application/json');
        }
        else
        {
          $this->temp_key = bcrypt($this->temp_key);
            $this->temp_key = ['ext_key' => $this->temp_key];
            $this->data = array_replace($this->data, $this->temp_key);
            $this->data = Manage_ext::create($this->data);
            if($this->data)
            {  
                
            $this->api = array(
                "one" => $this->url."/api/v1/background/image/app/".base64_encode($this->data->id)."/random",
                "two" => $this->url."/api/v1/shortcuts/app/all",
                "three" => $this->url."/api/v1/support/app/all",
                "four" => $this->url."/api/v1/backgroun/app/".base64_encode($this->data->id)."/all/images", 
                "five" => $this->url."/api/v1/game/app/all",
                "six" => $this->url."/api/v1/card/app/all",
                'seven' => $this->url."/api/v1/game-promo/app/all",
                "eight" => $this->url."/api/v1/more-app/app/all"
            );

             return response(array("data" => $this->api),200)->header('Content-Type', 'application/json');
            }
            else
            {
                return response(array("data" => "faild"),401)->header('Content-Type', 'application/json');
            }  
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $this->data = $request->all();
        Manage_ext::find($id)->update($this->data);
         return response(array("data" => $this->data),200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        

        
    

        $this->data =  Manage_ext::find($id);
        if($this->data->delete())
        {
            // delete image start

            $this->data = Manage_bg::where('ext_id',$id);
            $this->main_data = $this->data->get('image_path');
     
            
            for($this->i=0;$this->i<count($this->main_data);$this->i++)
            {
                $this->temp = $this->main_data[$this->i]['image_path'];

                if(File::delete('storage'.$this->temp))
                { 
                    $this->notice = "success";
                    
                }
                else
                {
                     $this->notice = "fail";
                }
                
            }
           
            if($this->data->delete())
            {
                    // delete support data 

                    $this->data = Manage_support::where('ext_id', $id);
                    if($this->data->delete())
                    {
                        $this->notice = "success";
                    }
                    else{
                        $this->notice = "fail";
                    }
                    // end delete support data
                
            }
            else
            {
                $this->notice = "fail";
            }

            return response(array('data'=>$this->notice),200)->header('Content-Type','application/json');
            
            //end delete image
  
        }
        else
        {
            return response(array('data'=>'Faild to delete'),404)->header('Content-Type','application/json');
        }
        
    }
}
