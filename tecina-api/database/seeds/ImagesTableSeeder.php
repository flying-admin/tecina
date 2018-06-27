<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes =  DB::table('dishes')->get();
        

        foreach ($dishes as $dish) {

            $imge_numb = rand(3,4);


            for ($j= 0 ; $j < $imge_numb ;$j++){
                try{
                    DB::table('images')->insert([
                        'id_dish' => $dish->id,
                        'name' => 'dish_'.$dish->id.'_'.($j+1).'.png'
                    ]);
                }catch( Exception $exception){

                }
            }

        }
    }
}
