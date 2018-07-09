<?php

namespace App\Http\Controllers;

use App\Misc;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        return (Misc::where('key',$key)->first()->value);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function edit(Misc $misc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $misc)
    {
        Misc::where('key',$request->key)->update(['value'=>$request->value]);
        return ['key'=>$request->key,'value'=>$request->value];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Misc $misc)
    {
        //
    }
}
