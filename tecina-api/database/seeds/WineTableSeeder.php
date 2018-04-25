<?php

use Illuminate\Database\Seeder;

class WineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lang =  DB::table('languages')->get();

        $cant = 15;

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('wines')->insert([
                'image' => 'image-' . $i . '.jpg',
                'name' => 'wine' . $i,
                'id_wine_type' =>  DB::table('wine_types')->inRandomOrder()->first()->id,
                'id_do' => DB::table('do')->inRandomOrder()->first()->id,
                'year' => rand(1880,2018)
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('wines_translations')->insert([
                    [
                        'id_wine' => $i+1,
                        'id_language' => $lan->id,
                        'description' =>$lan->code .'-description' . ($i+1)
                    ]
                ]);
            }
        }

    }
}
