<?php

use Illuminate\Database\Seeder;

class WineTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lang =  DB::table('languages')->get();

        $wine_types = [ 
            'es' =>[ 'Vino Tinto', 'Vino Blanco', 'Vino Rosado', 'Espumosos' ], 
            'en' => [ 'Red Wine', 'White Wine', 'Rosé Wine' , 'Sprarkling wines' ],
            'de' =>[ 'Rotwein', 'Weißwein', 'Roséwein', 'Sprärkling Weine'] 
          ];


        foreach ($wine_types['es'] as $index => $type){
            $wineTypeId = DB::table('wine_types')->insertGetId([
                'id' => NULL
            ]);

            foreach ($lang as $lan) {
                DB::table('wine_type_translations')->insert([
                    [
                        'id_wine_type' => $wineTypeId,
                        'id_language' => $lan->id,
                        'name' =>$wine_types[$lan->code][$index]
                    ]
                ]);
            }
        }

    }
}
