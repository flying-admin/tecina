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
        $drinkTypesTranslations=[
          'Vino'=>['es'=>'Vino','en'=>'Wine','de'=>'Wein'],
          'Sangria'=>['es'=>'Sangria','en'=>'Sangria','de'=>'Sangria'],
          'Cerveza'=>['es'=>'Cerveza','en'=>'Beer','de'=>'Bier'],
          'Refresco'=>['es'=>'Refresco','en'=>'Drink','de'=>'Getränk'],
          'Agua Mineral'=>['es'=>'Agua Mineral','en'=>'Mineral Water','de'=>'Mineralwasser'],
          'Zumo'=>['es'=>'Zumo','en'=>'Juice','de'=>'Saft']
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
                'name'=>$drinkTypesTranslations[$drinkType][$lang->code],
                'description'=>'',
                'drink_type_id'=>$idDrinkType,
                'language_id'=>$lang->id
              ]
            ]);
          }
        }
    }
}
