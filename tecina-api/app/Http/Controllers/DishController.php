<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use App\Allergen;
use App\FoodType;
use Illuminate\Http\Request;
use DB;

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
		foreach(Dish::all()->where('active',true) as $dish)
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
        $dish = Dish::find($id);
        $translations = prettyTranslate($dish->getTranslate()->get());
        $allergens=$dish->allergens()->get();
        $foodTypes=$dish->foodTypes()->get();
        $categories=$dish->categories()->get();
        $images=$dish->images()->get();
        $allergenTranslations = [];
        $allergenIds=[];
        foreach($allergens as $allergen){
          $allergenIds[]=$allergen->id;
        }
    foreach(\App\Allergen::all() as $allergen)
    {
      $translate = prettyTranslate($allergen->getTranslate()->get());
      $allergenTranslations[$allergen->id] = $translate;
    }
    $foodTypeTranslations=[];
    $foodTypeIds=[];
    $categoryTranslations=[];
    $categoryIds=[];
    foreach($foodTypes as $foodtype){
      $foodTypeIds[]=$foodtype->id;
    }
    foreach($categories as $category){
      $categoryIds[]=$category->id;
    }
    foreach(\App\FoodType::all() as $foodtype)
    {
      $translate = prettyTranslate($foodtype->getTranslate()->get());
      $foodTypeTranslations[$foodtype->id] = $translate;
    }
    foreach(\App\Category::all() as $category)
    {
      $translate = prettyTranslate($category->getTranslate()->get());
      $categoryTranslations[$category->id] = $translate;
    }

        $resultado=[
          'dish'=>$dish,
          'translations'=>$translations,
          'allergens'=>$allergens,
          'foodTypes'=>$foodTypes,
          'categories'=>$categories,
          'images'=>$images,
          'allergenTranslations'=>$allergenTranslations,
          'allergenIds'=>$allergenIds,
          'foodTypeIds'=>$foodTypeIds,
          'foodTypeTranslations'=>$foodTypeTranslations,
          'categoryIds'=>$categoryIds,
          'categoryTranslations'=>$categoryTranslations,
        ];
        // dd ($resultado);
        return view('admin.dish_edit', $resultado);
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
        if(DB::table('dishes_translations')->where('id_dish',$id)->where('id_language',$lang->id)->count()){
          DB::table('dishes_translations')->where('id_dish',$id)->where('id_language',$lang->id)->update(['description'=>($request->$descripcion)?$request->$descripcion:' ', 'name'=>($request->$name)?$request->$name:' ']);
        }else{
          DB::table('dishes_translations')->insert(['id_dish'=>$id,'id_language'=>$lang->id,'description'=>($request->$descripcion)?$request->$descripcion:' ','name'=>($request->$name)?$request->$name:' ']);
        }
      }
      DB::table('dishes')->where('id',$id)->update([
          'ingredients'=>$request->ingredients,
          'active'=>($request->active == 'on')?true:false,
          ]);
    return redirect('api/dishes/'.$id.'/edit');
    }

    public function uploadDishImage(Request $request, $dishId){
      $respuesta=['dishId'=>$dishId];
      if ($request->hasFile('file'))
      {
      $file = $request->file('file');
      $image_name = time()."-".$file->getClientOriginalName();
      $img_route='/img/dishes/'. $image_name;
      $file->move('img/dishes', $image_name);
      $dish = \App\Dish::find($dishId);
      $dish->image=$img_route;
      $dish->save();
      $respuesta ['img'] = $img_route;
      }else{
        $respuesta ['img'] = 'not-found.jpg';
      }
      // hay que redimensionarla a este tamaño: 1760 × 960
      return response()->json($respuesta,200);
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


        public function addDishAllergen($id, $allergenId){
          $data=false;
          if(DB::table('allergens_dishes')->insert(['id_dish'=>$id,'id_allergen'=>$allergenId])){
            $allergen=Allergen::where('id',$allergenId)->first();
            $allergenTranslations=prettyTranslate($allergen->getTranslate()->get());
            $allergenName=$allergenTranslations['es']['name'];
            $data=['allergenId'=>$allergen->id,'allergenName'=>$allergenName];
          }
          return response()->json($data,200);
        }

        public function deleteDishAllergen($dishId, $allergenId)
        {
          $data=false;
          if(DB::table('allergens_dishes')->where('id_dish',$dishId)->where('id_allergen',$allergenId)->delete()){
            $data=$allergenId;
          }else{
            $data="No se pudo DB::table('allergens_dishes')->where('id_dish',$dishId)->where('id_allergen',$allergenId)->delete()";
          }
          return response()->json($data,200);
        }

        public function addDishFoodType($id, $foodTypeId){
          $data=false;
          if(DB::table('dishes_food_types')->insert(['id_dish'=>$id,'id_food_type'=>$foodTypeId])){
            $foodType=FoodType::where('id',$foodTypeId)->first();
            $foodTypeTranslations=prettyTranslate($foodType->getTranslate()->get());
            $foodTypeName=$foodTypeTranslations['es'];
            $data=['foodTypeId'=>$foodType->id,'foodTypeName'=>$foodTypeName];
          }
          return response()->json($data,200);
        }

        public function deleteDishFoodType($dishId, $foodTypeId)
        {
          $data=false;
          if(DB::table('dishes_food_types')->where('id_dish',$dishId)->where('id_food_type',$foodTypeId)->delete()){
            $data=$foodTypeId;
          }else{
            $data="No se pudo DB::table('dishes_food_types')->where('id_dish',$dishId)->where('id_food_type',$foodTypeId)->delete()";
          }
          return response()->json($data,200);
        }

        public function addDishCategory($id, $categoryId){
          $data=false;
          if(DB::table('categories_dishes')->insert(['id_dish'=>$id,'id_category'=>$categoryId])){
            $category=Category::where('id',$categoryId)->first();
            $categoryTranslations=prettyTranslate($category->getTranslate()->get());
            $categoryName=$categoryTranslations['es']['name'];
            $data=['categoryId'=>$category->id,'categoryName'=>$categoryName];
          }
          return response()->json($data,200);
        }

        public function deleteDishCategory($dishId, $categoryId)
        {
          $data=false;
          if(DB::table('categories_dishes')->where('id_dish',$dishId)->where('id_category',$categoryId)->delete()){
            $data=$categoryId;
          }else{
            $data="No se pudo DB::table('categories_dishes')->where('id_dish',$dishId)->where('id_category',$categoryId)->delete()";
          }
          return response()->json($data,200);
        }

}
