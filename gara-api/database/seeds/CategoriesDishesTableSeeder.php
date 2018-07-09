<?php

use Illuminate\Database\Seeder;

class CategoriesDishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes =  DB::table('dishes')->get();

        foreach ($dishes as $dish) {

            $category_numb = rand(1 ,2 );
            $category =  DB::table('categories')->inRandomOrder()->take($category_numb)->get();

            for ($j= 0 ; $j <= $category_numb ;$j++){
                try{
                    DB::table('categories_dishes')->insert([
                        'id_category' =>  $category[$j]->id,
                        'id_dish' => $dish->id
                    ]);
                }catch( Exception $exception){

                }
            }

        }
    }
}
