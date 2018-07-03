<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wine;
use App\WineType;
use App\WineVariety;
use DB;

class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [];
      foreach(Wine::all() as $wine)
      {
        // dd ($wine->getTranslate()->get());
        $wine->translate = prettyTranslate($wine->getTranslate()->get());
        $wine->wineVarieties = $wine->wineVarieties()->get()->pluck('id')->toArray();
        $data[] = $wine;
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
        $wine=Wine::find($id);
        $do=$wine->originDenomination()->get();
        $varieties=$wine->wineVarieties()->get();
        $varietiesTranslations=[];
        foreach($varieties as $variety){
          $varietiesTranslations[$variety->id]=prettyTranslate($variety->getTranslate()->get());
        }
        $description=prettyTranslate($wine->getTranslate()->get());
        $age=$wine->wineAge()->get()->first();
        $ageTranslation=($age)?prettyTranslate($age->getTranslate()->get()):'';
        $class=$wine->wineClass()->get()->first();
        $classTranslation=($class)?prettyTranslate($class->getTranslate()->get()):'';
        $type=$wine->wineType()->get()->first();
        $typeTranslation=($type)?prettyTranslate($type->getTranslate()->get()):'';
        $values=[
            'wine'=>$wine,
            'do'=>$do,
            'varieties'=>$varieties,
            'varietieTranslations'=>$varietiesTranslations,
            'translation'=>$description,
            'age'=>$age,
            'ageTranslation'=>$ageTranslation,
            'class'=>$class,
            'classTranslation'=>$classTranslation,
            'type' =>$type,
            'typeTranslation'=>$typeTranslation
          ];
          return view('admin.wine_edit', $values);
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
        //
    }

    public function addWineVariety($id, $varietyId){
      $data=false;
      if(DB::table('wines_wine_varieties')->insert(['id_wine'=>$id,'id_wine_variety'=>$varietyId])){
        $variety=WineVariety::where('id',$varietyId)->first();
        $varietyTranslations=prettyTranslate($variety->getTranslate()->get());
        $varietyName=$varietyTranslations['es'];
        $data=['varietyId'=>$variety->id,'varietyName'=>$varietyName];
      }
      return response()->json($data,200);
    }

    public function deleteWineVariety($wineId, $varietyId)
    {
      $data=false;
      if(DB::table('wines_wine_varieties')->where('id_wine',$wineId)->where('id_wine_variety',$varietyId)->delete()){
        $data=$varietyId;
      }else{
        $data="No se pudo DB::table('wines_wine_varieties')->where('id_wine',$wineId)->where('id_wine_variety',$varietyId)->delete()";
      }
      return response()->json($data,200);
    }
}
