<?php

use Illuminate\Database\Seeder;

class DishesMenusTableSeeder extends Seeder
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

        //     $dishes_numb = 5;
        //     $dishes = DB::table('dishes')->inRandomOrder()->take($dishes_numb)->get();

        //     for ($j= 0 ; $j < $dishes_numb ;$j++){
        //         try{

        //             DB::table('dishes_menus')->insert([
        //                 'id_dish' =>  $dishes[$j]->id,
        //                 'id_menu' => $menu->id
        //             ]);
        //         }catch( Exception $exception){

        //         }
        //     }

        // }

    }
}
