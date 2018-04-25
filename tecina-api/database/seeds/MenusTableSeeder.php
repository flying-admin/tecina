<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
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

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('menus')->insert([
                'image' => 'image-' . $i . '.jpg',
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('menus_translations')->insert([
                    [
                        'id_menu' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_name' . ($i+1),
                        'description' =>$lan->code .'-description' . ($i+1)
                    ]
                ]);
            }
        }
    }
}
