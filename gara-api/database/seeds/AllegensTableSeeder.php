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

        $allergens = [
            'es' =>[ 'crustáceos', 'moluscos', 'dióxido de azufre y sulfitos', 'altramuces', 'pescado', 'gluten', 'apio','frutos de cáscara','cacahuetes' ,'huevos', 'soja', 'mostaza', 'granos de sésamo', 'lácteos', ],
            'en' =>[ 'seafood', 'shellfish', 'sulfurdioxide and sulfites', 'lupins', 'fish', 'gluten', 'celery', 'nuts','peanuts', 'egg', 'soya', 'mustard', 'sesame seeds', 'dairy products',],
            'de' =>[ 'Meeresfrüchte', 'Schaltier', 'Schwefeldioxid und Sulfite', 'Lupinen', 'Fisch', 'Gluten', 'Sellerie', 'Nüsse','Erdnüsse','Ei', 'Soja', 'Senf', 'Sesamsamen', 'Milchprodukte', ]
        ];

        $allergens_icons = ['crustaceos', 'moluscos', 'sulfitos', 'altramuces', 'pescado', 'gluten', 'apio', 'frutos_cascara','cacahuetes' ,  'huevos', 'soja' , 'mostaza', 'sesamo', 'lacteos'];

        for ($i = 0 ; $i < count($allergens_icons) ; $i++){
            $allergenId = DB::table('allergens')->insertGetId([
                    'icon' => $allergens_icons[$i]
            ]);

            foreach ($lang as $lan) {
                DB::table('allergens_translations')->insert([
                        'id_allergen' => $allergenId,
                        'id_language' => $lan->id,
                        'name' => $allergens[$lan->code][$i],
                        'description' => ''
                ]);
            }
        }

    }
}
