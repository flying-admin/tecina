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

        $cant = 5;

        $type= ['blanco','tinto','rosado','espumoso','generoso'];


        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('wine_types')->insert([
                'id' => NULL
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('wine_type_translations')->insert([
                    [
                        'id_wine_type' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$type[$i]
                    ]
                ]);
            }
        }

    }
}
