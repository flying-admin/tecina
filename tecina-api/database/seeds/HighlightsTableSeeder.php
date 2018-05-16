<?php

use Illuminate\Database\Seeder;

class HighlightsTableSeeder extends Seeder
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

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('highlights')->insert([
                'image' => 'highlight_' .($i + 1). '.jpg',
                'order' => ($i + 1)
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('highlights_translations')->insert([
                    [
                        'id_highlight' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_name' . ($i+1),
                        'description' =>$lan->code .' description' . ($i+1)
                    ]
                ]);
            }
        }
    }
}
