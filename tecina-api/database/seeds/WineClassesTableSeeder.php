<?php

use Illuminate\Database\Seeder;

class WineClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wineClasses=[
          'Seco',
          'Semiseco',
          'Afrutado',
          'Dulce',
          'Semi dulce'
        ];
        $langs =  DB::table('languages')->get();
        foreach($wineClasses as $wineClass){
          $idWineClass = DB::table('wine_classes')->insertGetId([
              'id' => NULL
          ]);
          foreach($langs as $lang){
            DB::table('wine_class_translations')->insert([
              'id'=>NULL,
              'wine_class_id'=>$idWineClass,
              'language_id'=>$lang->id,
              'name'=>$wineClass.'_'.$lang->code
            ]);
          }
        }
    }
}
