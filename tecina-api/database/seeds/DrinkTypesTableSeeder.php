<?php

use Illuminate\Database\Seeder;

class DrinkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drinkTypes=[
          'Vino',
          'Sangria',
          'Cerveza',
          'Refresco',
          'Agua Mineral',
          'Zumo'
          ];

        $langs =  DB::table('languages')->get();
        foreach($drinkTypes as $drinkType){
          $idDrinkType = DB::table('drink_types')->insertGetId([
              'id' => NULL
          ]);
          foreach($langs as $lang){
            DB::table('drink_type_translations')->insert([
              [
                'id'=> NULL,
                'name'=>$drinkType.'_'.$lang->code,
                'description'=>$drinkType,
                'drink_type_id'=>$idDrinkType,
                'language_id'=>$lang->id
              ]
            ]);
          }
        }
    }
}
