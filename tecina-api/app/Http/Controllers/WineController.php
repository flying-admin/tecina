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
        $do=$wine->originDenomination()->get()->first();
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
      $respuesta=[];
      $wine = \App\Wine::find($id);
      $langs=\App\Language::all();
      $translates = prettyTranslate($wine->getTranslate()->get());
      foreach($langs as $lang){
        $translate=@$translates[$lang->code];
        $respuesta[$lang->code]=$translate;
        $descripcion='description_'.$lang->code;
        if(DB::table('wines_translations')->where('id_wine',$id)->where('id_language',$lang->id)->count()){
          DB::table('wines_translations')->where('id_wine',$id)->where('id_language',$lang->id)->update(['description'=>$request->$descripcion]);
        }else{
          $descripcion2=$request->$descripcion;
          DB::table('wines_translations')->insert(['id_wine'=>$id,'id_language'=>$lang->id,'description'=>$descripcion2]);
        }
      }
        DB::table('wines')->where('id',$id)->update([
            'name'=>$request->wineName,
            'year'=>$request->year,
            'wine_age_id'=>$request->age,
            'active'=>($request->active == 'on')?true:false,
            'id_do'=> $request->do,
            'wine_age_id'=>$request->age,
            'wine_class_id'=>$request->class
          ]);
      return redirect('api/wines/'.$id.'/edit');
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

    public function uploadWineImage(Request $request, $wineId){
      $respuesta=['wineId'=>$wineId];
      if ($request->hasFile('file'))
      {
      $file = $request->file('file');
      $image_name = time()."-".$file->getClientOriginalName();
      $img_route='/img/wines/'. $image_name;
      $file->move('img/wines', $image_name);
      $wine = \App\Wine::find($wineId);
      $wine->image=$img_route;
      $wine->save();
      $respuesta ['img'] = $img_route;
      }else{
        $respuesta ['img'] = 'not-found.jpg';
      }
      // hay que redimensionarla a este tamaño: 1760 × 960
      return response()->json($respuesta,200);
    }
}
