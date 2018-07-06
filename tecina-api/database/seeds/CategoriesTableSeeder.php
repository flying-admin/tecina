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
            DB::table('categories')->insert([
                'id' => NULL
            ]);
        }

        for ($i = 0 ; $i < count($dish_types['es']) ; $i++) {
            foreach ($lang as $lan) {
                DB::table('categories_translations')->insert([
                    [
                        'id_category' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$dish_types[$lan->code][$i],
                        'description' => $dish_types[$lan->code][$i]
                    ]
                ]);
            }
        }

    }
}
