<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\helpers;
use App\Dish;
use App\Misc;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        return view('home');
    }
    public function listMenu(request $request)
    {
      $langs=getLangs();
      $menus=[];
      // dd(Menu::all());
      $menus_2=Menu::paginate(20);
      foreach($menus_2 as $menu){
        $my_menu=[
          'id'=>$menu->id,
          'img'=>$menu->image,
          'translate'=>prettyTranslate($menu->getTranslate()->get()),
        ];

          // $dishes=[];
          // foreach($menu->dishes()->get() as $dish){
          //   $dishes[$dish->id]=prettyTranslate($dish->getTranslate()->get())['es']['name'];
          // }
          // $my_menu['dishes']=$dishes;
          //
          // $wines=[];
          // foreach($menu->wines()->get() as $wine){
          //   $wines[$wine->id]=$wine->name;
          // }
          // $my_menu['wines']=$wines;
          $menus[]=$my_menu;
      }

        // dd($menus);
        return view('admin.menu', ['menus'=>$menus,'menus_2'=>$menus_2]);
    }
    public function listWine(request $request)
    {
      $langs=getLangs();
      $wines=\App\Wine::paginate(20);
      $highlighted_wine = Misc::where('key','highlighted_wine')->first()->value;
      return view('admin.wine', ['wines'=>$wines,'highlighted_wine'=>$highlighted_wine]);
    }
    public function listDish(request $request)
    {
      $langs=getLangs();
      $dishes=\App\Dish::paginate(20);
      foreach($dishes as $order=>$dish){
        $dish->name=prettyTranslate($dish->getTranslate()->get())['es']['name'];
        $dishes[$order]=$dish;
      }
      return view('admin.dish', ['dishes'=>$dishes]);
    }
    public function listHighlight(request $request)
    {
      $langs=getLangs();
      $highlights=\App\Highlight::paginate(20);
      foreach($highlights as $order=>$highlight){
        $highlight->name=prettyTranslate($highlight->getTranslate()->get())['es']['name'];
        $highlight[$order]=$highlight;
      }
      return view('admin.highlight', ['highlights'=>$highlights]);
    }
}
