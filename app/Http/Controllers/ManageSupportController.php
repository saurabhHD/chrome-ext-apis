<?php

namespace App\Http\Controllers;

use App\Manage_support;
use Illuminate\Http\Request;

class ManageSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $data;
    public $temp;
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
        $this->temp = $request->all('ext_id');
        $this->temp = Manage_support::where('ext_id',$this->temp)->get();
        if(count($this->temp) != 0)
        {
          return response(array('data' => 'already has'),404)->header('Content-Type','application/json');
        }
        else{
            
             if(Manage_support::create($this->data))
            {
                return response(array('data' => 'success'),200)->header('Content-Type','application/json');
            }
            else
            {
                 return response(array('data' => 'not found'),404)->header('Content-Type','application/json');
            } 
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manage_support  $manage_support
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->data = Manage_support::where('ext_id',$id))
        {
           $this->data =  $this->data->get();
            return response(array('data' => $this->data),200)->header('Content-Type','application/json'); 
        }
        else
        {
             return response(array('data' => 'not found'),404)->header('Content-Type','application/json'); 
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manage_support  $manage_support
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
     * @param  \App\Manage_support  $manage_support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->data = $request;
        $this->temp = Manage_support::where('ext_id', $id);
        $this->temp->update($this->data->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manage_support  $manage_support
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}