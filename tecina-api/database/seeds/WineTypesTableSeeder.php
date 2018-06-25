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

        $types = [
          'Vino Tinto',
          'Vino Blanco',
          'Vino Rosado',
          'Espumosos'
        ];


        foreach ($types as $type){
            $wineTypeId = DB::table('wine_types')->insertGetId([
                'id' => NULL
            ]);

            foreach ($lang as $lan) {
                DB::table('wine_type_translations')->insert([
                    [
                        'id_wine_type' => $wineTypeId,
                        'id_language' => $lan->id,
                        'name' =>$type
                    ]
                ]);
            }
        }

    }
}
