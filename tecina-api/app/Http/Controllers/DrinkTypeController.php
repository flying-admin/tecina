<?php

namespace App\Http\Controllers;

use App\DrinkType;
use Illuminate\Http\Request;

class DrinkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      foreach(DrinkType::all() as $drinktype)
      {
        $drinktype->translate = prettyTranslate($drinktype->getTranslate()->get());
        $data[] = $drinktype;
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
     * @param  \App\DrinkType  $drinkType
     * @return \Illuminate\Http\Response
     */
    public function show(DrinkType $drinkType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrinkType  $drinkType
     * @return \Illuminate\Http\Response
     */
    public function edit(DrinkType $drinkType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrinkType  $drinkType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrinkType $drinkType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrinkType  $drinkType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrinkType $drinkType)
    {
        //
    }
}
