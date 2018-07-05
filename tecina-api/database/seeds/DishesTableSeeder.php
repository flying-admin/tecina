<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lang =  DB::table('languages')->get();

        $cant = 80;

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('dishes')->insert([
                'ingredients' => 'ingredients_:' . $i. str_random(15),
                'active'=> TRUE,
                'image'=>'no-image.png',
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('dishes_translations')->insert([
                    [
                        'id_dish' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_name' . ($i+1),
                        'description' =>$lan->code .' description' . ($i+1)
                    ]
                ]);
            }
        }

    }
}
