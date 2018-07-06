<?php

use Illuminate\Database\Seeder;

class FoodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lang =  DB::table('languages')->get();

        $food_types = [
            'es' =>[ 'comida vegana', 'comida saludable', 'comida baja en sal'],
            'en' => [ 'vegan', 'healthy', 'low in salt'],  
            'de' =>[ 'vegan', 'gesund', 'wenig Salz']
          ];

        for ($i = 0 ; $i < count($food_types['es']) ; $i++){
            DB::table('food_types')->insert([
                'id' => NULL
            ]);
  
            foreach ($lang as $lan) {
                DB::table('food_types_translations')->insert([
                    [
                        'id_food_type' => $i+1,
                        'id_language' => $lan->id,
                        'name' => $food_types[$lan->code][$i]
                    ]
                ]);
            }
        }
    }
}
