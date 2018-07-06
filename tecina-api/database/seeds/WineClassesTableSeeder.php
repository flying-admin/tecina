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
        

        $wine_class = [ 
          'es' =>[ 'Seco', 'Semiseco', 'Afrutado', 'Dulce', 'Semi dulce' ], 
          'en' => [ 'Dry', 'Medium', 'Fruty', 'Very sweet', 'Sweet'], 
          'de' =>[ 'Trocken', 'Mittel', 'Fruty', 'Sehr süß', 'Süss' ], 
        ];

        $langs =  DB::table('languages')->get();

        foreach($wine_class['es'] as $index => $wineClass){
          $idWineClass = DB::table('wine_classes')->insertGetId([
              'id' => NULL
          ]);
          foreach($langs as $lang){
            DB::table('wine_class_translations')->insert([
              'id'=>NULL,
              'wine_class_id'=>$idWineClass,
              'language_id'=>$lang->id,
              'name'=>$wine_class[$lang->code][$index]
            ]);
          }
        }
    }
}
