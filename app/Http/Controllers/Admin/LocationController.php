<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LocationRequest;
use App\Http\Controllers\Controller;
use View;

class LocationController extends Controller
{
    /**
    * DateCreate 2016-01-21
    * Create By golf
    */

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return View::make('admin.location.index') ;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $setData['actionLink']      = action('Admin\LocationController@store') ;
        $setData['action']          = 'create' ;
        $setData['data']            = [];
        return View::make('admin.location.add_edit', $setData) ;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  App\Http\Requests\Admin\LocationRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(LocationRequest $request)
    {
        $dataInsert                 = $request->except('_token') ;


        d($dataInsert) ;
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(int $id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(int $id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  App\Http\Requests\Admin\LocationRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(LocationRequest $request, int $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(int $id)
    {
        //
    }
}