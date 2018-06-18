<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lang =  DB::table('languages')->get();

        $categories = [
            'entrantes frios','entrantes calientes','carnes', 'pescados' , 'postres'
        ];

        for ($i = 0 ; $i < count($categories) ; $i++){
            DB::table('categories')->insert([
                'id' => NULL
            ]);
        }

        for ($i = 0 ; $i < count($categories) ; $i++) {
            foreach ($lang as $lan) {
                DB::table('categories_translations')->insert([
                    [
                        'id_category' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_'. $categories[$i],
                        'description' =>$lan->code .'_'. $categories[$i].' description'
                    ]
                ]);
            }
        }

    }
}
