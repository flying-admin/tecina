<?php

use Illuminate\Database\Seeder;

class AllergensDishesTableSeeder extends Seeder
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

        //     $allergen_numb = rand(0 ,3 );
        //     $allergen= DB::table('allergens')->inRandomOrder()->take($allergen_numb)->get();

        //     for ($j= 0 ; $j < $allergen_numb ;$j++){
        //         try{
        //             DB::table('allergens_dishes')->insert([
        //                 'id_allergen' =>  $allergen[$j]->id,
        //                 'id_dish' => $dish->id
        //            ]);
        //         }catch( Exception $exception){

        //         }
        //     }

        // }
    }
}
