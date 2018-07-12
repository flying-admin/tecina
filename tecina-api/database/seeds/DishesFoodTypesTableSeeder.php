<?php

use Illuminate\Database\Seeder;

class DishesFoodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $dishes =  DB::table('dishes')->get();

        // foreach ($dishes as $dish) {

        //     $food_type_numb = rand(0 ,3 );
        //     $food_type = DB::table('food_types')->inRandomOrder()->take($food_type_numb)->get();

        //     for ($j= 0 ; $j <= $food_type_numb ;$j++){
        //         try{
        //             DB::table('dishes_food_types')->insert([
        //                 'id_food_type' => $food_type[$j]->id,
        //                 'id_dish' => $dish->id
        //             ]);
        //         }catch( Exception $exception){

        //         }
        //     }

        // }

    }
}
