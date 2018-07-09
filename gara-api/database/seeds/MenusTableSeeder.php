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
           $menuID = DB::table('menus')->insertGetId([
                'image' => 'menu_' . ($i+1) . '.png',
                'active'=> TRUE
            ]);
       
            foreach ($lang as $lan) {
                DB::table('menus_translations')->insert([
                    [
                        'id_menu' => $menuID,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_name' . ($i+1),
                        'description' =>$lan->code .'-description' . ($i+1)
                    ]
                ]);
            }
        }
    }
}
