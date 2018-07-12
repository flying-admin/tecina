<?php

use Illuminate\Database\Seeder;

class WinesWineVarietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $wines =  DB::table('wines')->get();

        // foreach ($wines as $wine) {

        //     $wine_varieties = rand(0 ,1 );
        //     $varieties = DB::table('wine_varieties')->inRandomOrder()->take($wine_varieties)->get();

        //     for ($j= 0 ; $j <= $wine_varieties ;$j++){
        //         try{
        //             DB::table('wines_wine_varieties')->insert([
        //                 'id_wine_variety' => $varieties[$j]->id ,
        //                 'id_wine' => $wine->id
        //             ]);
        //         }catch( Exception $exception){

        //         }
        //     }

        // }

    }
}
