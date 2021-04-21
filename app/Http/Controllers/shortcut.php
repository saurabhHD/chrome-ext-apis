<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manage_shortcut;
use Illuminate\Support\Facades\File;
class shortcut extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public $temp;
    public $fileinfo;
    public $filename;
    public $s_number;
    public $random;
    public function index()
    {
        $this->data = Manage_shortcut::all('id','s_number','title');
        return response(array('data' => $this->data),200)->header('Content-Type','application/json');
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
        $this->data = $request->all();
        $this->s_number = intval($this->data['s_number']);
        $this->s_number = Manage_shortcut::where('s_number',$this->s_number)->get();
        if(count($this->s_number) == 0)
        {
            $this->fileinfo =  $request->file('image_path');
            $this->filename = $this->random."__".$this->fileinfo->getClientOriginalName();
            if($this->fileinfo->storeAs('public',$this->filename))
            {
                $this->temp = array('image_path' => $this->filename);
                $this->data = array_replace($this->data, $this->temp);

                if(Manage_shortcut::create($this->data))
                {
                    return response(array('data' => 'success'),200)->header('Content-Type','application/json');
                }
                else
                {
                    return response(array('data' => 'faild'),404)->header('Content-Type','application/json'); 
                }
            }
            else
            {
                return response(array('data' => 'faild'),404)->header('Content-Type','application/json');
            }
        }
        else
        {
            return response(array('data' => 'aleredy created'),404)->header('Content-Type','application/json');
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
        //
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
        $this->data = $request->all();
        Manage_shortcut::find($id)->update($this->data);
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
        $this->data = Manage_shortcut::where('s_number',$id);
        $this->temp = $this->data->get('image_path');
        $this->temp = $this->temp[0]['image_path'];
        if(File::delete('storage/'.$this->temp))
        {
            if($this->data->delete())
            {
                return response(array('notice' => 'success'), 200)->header('Content-Type', 'application/json');
            }
            else
            {
                return response(array('notice' => 'faild'), 404)->header('Content-Type', 'application/json');
            }
        }
        else
        {
            return response(array('notice' => 'faild'), 404)->header('Content-Type', 'application/json');
        }
    }
}
