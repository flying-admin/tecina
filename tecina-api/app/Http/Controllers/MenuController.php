<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Dish;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data = [];
		foreach(Menu::all() as $menu)
		{
			$menu->translate = prettyTranslate($menu->getTranslate()->get());
			$menu->dishes = $menu->dishes()->get()->pluck('id')->toArray();
			$menu->wines = $menu->wines()->get()->pluck('id')->toArray();
			$data[] = $menu;
		}

        return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()->json(['probando'=>$request],200);
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
      $menu=Menu::find($id);
      $menu->translate = prettyTranslate($menu->getTranslate()->get());
      foreach($menu->dishes()->get() as $dishId ){
        $dish=prettyTranslate(Dish::find($dishId->id)->getTranslate()->get())['es'];
        // dd(prettyTranslate($dish->getTranslate()->get()));
        // dd($dish);
        $menu->dishes[] = prettyTranslate(Dish::find($dishId->id)->getTranslate()->get())['es'];
      }
      $menu->wines = $menu->wines()->get()->pluck('id')->toArray();
      dd($menu->toArray());
      return response()->json($menu,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=Menu::find($id);
        $values=[
          'id'=>$menu->id,
          'image'=>$menu->image,
          'translation'=>prettyTranslate($menu->getTranslate()->get()),
          'dishes'=>$menu->dishes()->get()
        ];
        // dd($values);
        return view('admin.menu_edit', $values);
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
}