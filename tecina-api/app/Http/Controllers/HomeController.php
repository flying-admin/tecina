<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\helpers;
use App\Dish;

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
      return view('admin.wine', ['wines'=>$wines]);
    }
}
