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

        $cant = 3;
        $food_types = ['comida vegana','comida baja en sal','comida saludable'];

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('food_types')->insert([
                'id' => NULL
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('food_types_translations')->insert([
                    [
                        'id_food_type' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_'.$food_types[$i]
                    ]
                ]);
            }
        }
    }
}
