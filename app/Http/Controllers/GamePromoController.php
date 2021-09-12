<?php

namespace App\Http\Controllers;
use App\Gamepromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class GamePromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = Gamepromo::all();
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
        if(count(Gamepromo::all()) == 0)
        {
            $this->data = $request;
            $this->data = $this->data->all();
            $this->image_name = $request->file('image_path')->getClientOriginalName();
            if($request->file('image_path')->storeAs('public/card/' , $this->image_name))
            {
                 
                $this->temp = array("image_path" => "card/".$this->image_name);
                $this->data = array_replace($this->data, $this->temp);
                if(Gamepromo::create($this->data))
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
        else
        {
            return response(array('data' => "faild"),401)->header('Content-Type', 'application/json');
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
        $this->data = Gamepromo::find($id);
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
