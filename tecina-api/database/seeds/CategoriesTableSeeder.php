<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lang =  DB::table('languages')->get();

        $dish_types =[
            'es' =>['entrantes fríos', 'entrantes calientes', 'carnes', 'pescados', 'postres',],
            'en' => [ 'cold starters', 'hot starters', 'meat', 'fish', 'deserts',],
            'de' =>['kalte Vorspeisen', 'heiße Vorspeisen', 'fleisch', 'fisch', 'wüsten',]
        ];

        for ($i = 0 ; $i < count($dish_types['es']) ; $i++){
           $categoryID = DB::table('categories')->insertGetId([
                'id' => NULL
            ]);
            foreach ($lang as $lan) {
                DB::table('categories_translations')->insert([
                        'id_category' => $categoryID,
                        'id_language' => $lan->id,
                        'name' =>$dish_types[$lan->code][$i],
                        'description' => $dish_types[$lan->code][$i]
                ]);
            }
        }
    }
}
