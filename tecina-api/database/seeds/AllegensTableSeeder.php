<?php

use Illuminate\Database\Seeder;

class AllegensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lang =  DB::table('languages')->get();

        $cant = 14;

        $allergens = [
            'crustaceos',
            'moluscos',
            'dióxido de azufre y sulfitos',
            'altramuces',
            'pescado',
            'contiene Gluten',
            'apio',
            'cacahuetes',
            'frutos de cascara',
            'huevos',
            'soja' ,
            'mostaza' ,
            'granos de sésamo',
            'lácteos'
        ];

        $allergens_icons = [
            'crustaceos',
            'moluscos',
            'sulfitos',
            'altramuces',
            'pescado',
            'gluten',
            'apio',
            'cacahuetes',
            'frutos_cascara',
            'huevos',
            'soja' ,
            'mostaza' ,
            'sesamo',
            'lacteos'
        ];

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('allergens')->insert([
                [
                    'icon' => $allergens_icons[$i]
                ]
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('allergens_translations')->insert([
                    [
                        'id_allergen' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_'.$allergens[$i],
                        'description' =>  $lan->code.'_'.$allergens[$i].' description'
                    ]
                ]);
            }
        }

    }
}
