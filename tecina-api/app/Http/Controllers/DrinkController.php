<?php

namespace App\Http\Controllers;

use App\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=[];
      foreach(Drink::all() as $drink){
        $drink->translate=prettyTranslate($drink->getTranslate()->get());
        $data[]=$drink;
      }
      return $data;
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
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        //
    }



    // public function uploadDrinkImage(Request $request, $drinkId){
    //     $respuesta=['drinkId'=>$drinkId];
    //     if ($request->hasFile('file'))
    //     {
    //     $file = $request->file('file');
    //     $image_name = time()."-".$file->getClientOriginalName();
    //     $img_route='/img/drinks/'. $image_name;
    //     $file->move('img/drinks', $image_name);
    //     $drink = \App\Drink::find($drinkId);
    //     $drink->image=$img_route;
    //     $drink->save();
    //     $respuesta ['img'] = $img_route;
    //     }else{
    //       $respuesta ['img'] = 'not-found.jpg';
    //     }
    //     // hay que redimensionarla a este tamaño: 1760 × 960
    //     return response()->json($respuesta,200);
    //   }
}
