<?php

namespace App\Http\Controllers;

use App\Drink;
use App\DrinkType;
use DB;
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
      $lang =  DB::table('languages')->get();
      $drinkId = DB::table('drinks')->insertGetId([
          'image' => 'no-image.png',
          'drink_type_id' => 1,
      ]);
      foreach ($lang as $lan) {
          DB::table('drink_translations')->insert([
              [
                  'drink_id' => $drinkId,
                  'language_id' => $lan->id,
                  'name' =>$lan->code .'_name',
                  'description' =>$lan->code .'-description'
              ]
          ]);
      }

        return redirect('api/drinks/'.$drinkId.'/edit');
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

      $translations = prettyTranslate($drink->getTranslate()->get());
          $resultado=[
            'drink'=>$drink,
            'translations'=>$translations,
            'drink_type' => $drink->drink_type_id,
          ];
          $drinkTypes = DrinkType::all();
          $drinkTypeTranslations=[];
          foreach($drinkTypes as $drinkType){
            $drinkTypeTranslations[$drinkType->id]=prettyTranslate($drinkType->getTranslate()->get());
          }
          $resultado['drinkTypeTranslations']=$drinkTypeTranslations;

          return view('admin.drink_edit', $resultado);
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
      $id=$drink->id;
      $langs=\App\Language::all();
      foreach($langs as $lang){
        $descripcion='description_'.$lang->code;
        $name='name_'.$lang->code;
        if(DB::table('drink_translations')->where('drink_id',$id)->where('language_id',$lang->id)->count()){
          DB::table('drink_translations')->where('drink_id',$id)->where('language_id',$lang->id)->update(['description'=>($request->$descripcion)?$request->$descripcion:' ', 'name'=>($request->$name)?$request->$name:' ']);
        }else{
          DB::table('drink_translations')->insert(['drink_id'=>$id,'language_id'=>$lang->id,'description'=>($request->$descripcion)?$request->$descripcion:' ','name'=>($request->$name)?$request->$name:' ']);
        }
      }
      DB::table('drinks')->where('id',$id)->update([
          'drink_type_id'=>$request->drink_type,
          // 'active'=>($request->active == 'on')?true:false,
          ]);
          // dd($request);
      return redirect('api/drinks/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();
        return redirect('/drink');
    }



    public function uploadDrinkImage(Request $request, $drinkId){
      // dd([$request,$drinkId]);
        $respuesta=['drinkId'=>$drinkId];
        if ($request->hasFile('file'))
        {
        $file = $request->file('file');
        $image_name = time()."-".$file->getClientOriginalName();
        $img_route='/img/drinks/'. $image_name;
        $file->move('img/drinks', $image_name);
        $drink = \App\Drink::find($drinkId);
        $drink->image=$image_name;
        $drink->save();
        $respuesta ['img'] = $img_route;
        }else{

          $drink = \App\Drink::find($drinkId);
          $drink->image='';
          $drink->save();
          $respuesta ['img'] = 'not-found.jpg';
        }

        return response()->json($respuesta,200);
      }
}
