<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
		foreach(Dish::all() as $dish)
		{
			$dish->translate = prettyTranslate($dish->getTranslate()->get());
			$images = [];
			foreach($dish->images()->get() as $image){
				$images[]=$image->name;
			}
			$dish->images = $images;

			/* $allergens=[];
			foreach($dish->allergens()->get() as $allergen){
				$translate=prettyTranslate($allergen->getTranslate()->get());
				$my_allergen=['icon'=>$allergen['icon'],'id'=>$allergen['id']];
				$my_allergen['lang']=$translate;
				$allergens[]=$my_allergen;
			}
			$dish->allergens = $allergens;
			 */
			$dish->allergens = $dish->allergens()->get()->pluck('id')->toArray();
			/* $food_types=[];
			foreach($dish->foodTypes()->get() as $food_type){
				$translate=prettyTranslate($food_type->getTranslate()->get());
				$food_types[]=$translate;
			}
			$dish->foodTypes = $food_types;
			 */
			$dish->foodTypes = $dish->foodTypes()->get()->pluck('id')->toArray();
			/* $categories=[];
			foreach($dish->categories()->get() as $category){
				$translate=prettyTranslate($category->getTranslate()->get());
				$categories[]=$translate;
			}
			$dish->categories = $categories;
			 */
			$dish->categories = $dish->categories()->get()->pluck('id')->toArray();
			$data[] = $dish;
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
        $dish = Dish::find($id);

		$allergens = [];
		foreach($dish->Allergens()->get() as $data)
		{
			$allergens[]=[$data['id'],$data['icon']];
		}
		$dish->Allergens = $allergens;

		/*
		$translate = [];
		foreach($dish->getTranslate()->get() as $data)
		{
			$translate[$data['code']] = [
				'name'        => $data['pivot']['name'],
				'description' => $data['pivot']['description']
			];
		}
		$dish->Translate = $translate;
		*/
		$dish->Lang = prettyTranslate($dish->getTranslate()->get());

		return response()->json($dish,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
