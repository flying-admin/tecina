<?php

namespace App\Http\Controllers;

use App\Highlight;
use Illuminate\Http\Request;
use DB;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Highlight::orderBy('order')->get();
		$highlights=[];
		foreach($data as $highlight){
			$highlight->lang=prettyTranslate($highlight->getTranslate()->get());
			$highlights[]=$highlight;
		}

        return response()->json($highlights,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $highlightID = DB::table('highlights')->insertGetId([
          'image' => 'no-image.png',
          'order' => 0
      ]);
      $lang =  DB::table('languages')->get();
      foreach ($lang as $lan) {
          DB::table('highlights_translations')->insert([
              [
                  'id_highlight' => $highlightID,
                  'id_language' => $lan->id,
                  'name' =>$lan->code .'_name',
                  'description' =>$lan->code .'-description'
              ]
          ]);
      }
        return redirect('api/highlights/'.$highlightID.'/edit');
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
        $Highlight = Highlight::find($id);
		    $Highlight->Translate = prettyTranslate($Highlight->getTranslate()->get());
		    return response()->json($Highlight,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $highlight = Highlight::find($id);
        $translations = prettyTranslate($highlight->getTranslate()->get());
        $highlight->translations=$translations;
        return view('admin.highlight_edit', ['highlight'=>$highlight]);
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
      $langs=\App\Language::all();
      foreach($langs as $lang){
        $descripcion='description_'.$lang->code;
        $name='name_'.$lang->code;
        if(DB::table('highlights_translations')->where('id_highlight',$id)->where('id_language',$lang->id)->count()){
          DB::table('highlights_translations')->where('id_highlight',$id)->where('id_language',$lang->id)->update(['description'=>($request->$descripcion)?$request->$descripcion:' ', 'name'=>($request->$name)?$request->$name:' ']);
        }else{
          DB::table('highlights_translations')->insert(['id_highlight'=>$id,'id_language'=>$lang->id,'description'=>($request->$descripcion)?$request->$descripcion:' ','name'=>($request->$name)?$request->$name:' ']);
        }
      }
      DB::table('highlights')->where('id',$id)->update([
          'order'=> $request->order
          ]);
      return redirect('api/highlights/'.$id.'/edit');
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

    public function uploadHighlightImage(Request $request, $highlightId){
      $respuesta=['highlightId'=>$highlightId];
      if ($request->hasFile('file'))
      {
      $file = $request->file('file');
      $image_name = time()."-".$file->getClientOriginalName();
      $img_route='/img/highlights/'. $image_name;
      $file->move('img/highlights', $image_name);
      $highlight = \App\Highlight::find($highlightId);
      $highlight->image=$image_name;
      $highlight->save();
      $respuesta ['img'] = $img_route;
      }else{
        $respuesta ['img'] = 'not-found.jpg';
      }
      // hay que redimensionarla a este tamaño: 1760 × 960
      return response()->json($respuesta,200);
    }
}
