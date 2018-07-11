<?php

use Illuminate\Database\Seeder;

class MenusWinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $menus =  DB::table('menus')->get();

        // foreach ($menus as $menu) {

        //     $wine_numb =  rand(6 ,10 );
        //     $wines = DB::table('wines')->inRandomOrder()->take($wine_numb)->get();

        //     for ($j= 0 ; $j < $wine_numb ;$j++){
        //         try{

        //             DB::table('menus_wines')->insert([
        //                 'id_wine' =>  $wines[$j]->id,
        //                 'id_menu' => $menu->id
        //             ]);
        //         }catch( Exception $exception){

        //         }
        //     }

        // }

    }
}
