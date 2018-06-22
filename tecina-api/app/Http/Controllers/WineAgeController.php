<?php

namespace App\Http\Controllers;

use App\WineAge;
use Illuminate\Http\Request;

class WineAgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        foreach (WineAge::all() as $wineAge) {
          $data[$wineAge->id]=prettyTranslate($wineAge->getTranslate()->get());
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
     * @param  \App\WineAge  $wineAge
     * @return \Illuminate\Http\Response
     */
    public function show(WineAge $wineAge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WineAge  $wineAge
     * @return \Illuminate\Http\Response
     */
    public function edit(WineAge $wineAge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WineAge  $wineAge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WineAge $wineAge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WineAge  $wineAge
     * @return \Illuminate\Http\Response
     */
    public function destroy(WineAge $wineAge)
    {
        //
    }
}
