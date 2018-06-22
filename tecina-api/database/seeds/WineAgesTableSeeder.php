<?php

use Illuminate\Database\Seeder;
use App\Language;
class WineAgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $wineAges=[
        'Sin Crianza',
        'Crianza',
        'Reserva',
        'Gran Reserva'
      ];
      foreach($wineAges as $wineAge){
        $wineAgeId = DB::table('wine_ages')-> insertGetId([]);
        foreach(Language::all() as $lang){
          DB::table('wine_age_translations')->insert(['wine_age_id'=>$wineAgeId,'language_id'=>$lang->id,'name'=>$wineAge.'_'.$lang->code]);
        }
      }
    }
}
