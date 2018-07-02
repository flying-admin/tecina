<?php

namespace App\Http\Controllers;

use App\WineClass;
use Illuminate\Http\Request;

class WineClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      foreach(WineClass::all() as $wineClass)
      {
        $wineClass->translate = prettyTranslate($wineClass->getTranslate()->get());
        $data[] = $wineClass;
      }
      return response()->json($data,200);
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
     * @param  \App\WineClass  $wineClass
     * @return \Illuminate\Http\Response
     */
    public function show(WineClass $wineClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WineClass  $wineClass
     * @return \Illuminate\Http\Response
     */
    public function edit(WineClass $wineClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WineClass  $wineClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WineClass $wineClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WineClass  $wineClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(WineClass $wineClass)
    {
        //
    }
}
