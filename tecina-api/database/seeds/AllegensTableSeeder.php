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
            'mosataza' ,
            'granos de sésamo',
            'lácteos'
        ];

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('allergens')->insert([
                [
                    'icon' => str_replace(' ', '_', $allergens[$i]).'.jpg'
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
