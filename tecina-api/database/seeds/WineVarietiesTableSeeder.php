<?php

use Illuminate\Database\Seeder;

class WineVarietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lang =  DB::table('languages')->get();
        $varieties=[
          'Airen',
          'Alarije',
          'Albariño',
          'Albillo',
          'Albillo Criollo',
          'Albillo Mayor',
          'Albillo Real',
          'Alegrillo Negro',
          'Alfonso Lavallee',
          'Almuñeco',
          'Baboso Blanco',
          'Baboso Negro',
          'Black Rose',
          'Bobal',
          'Bremajuelo',
          'Brancellao',
          'Cabernet Franc',
          'Cabernet Sauvignon',
          'Caiño Tinto',
          'Calmería',
          'Cardinal',
          'Castellana',
          'Chardonnay',
          'Chasselas',
          'Chenin Blanc',
          'Corredera',
          'Cumdeo Blanc',
          'Cumdeo Rouge',
          'Diego',
          'Doña Blanca',
          'Emerald Seedless',
          'Espadeiro',
          'Flame Seedless',
          'Forastera',
          'Forastera blanca Gomera',
          'Gamay Noir',
          'Garnacha Blanca',
          'Garnacha Peluda',
          'Garnacha Tinta',
          'Garnacha Tintorera',
          'Garrido Fino',
          'Gewürztraminer',
          'Godello',
          'Gold',
          'Graciano',
          'Gual',
          'Italia',
          'Jaén Tinto',
          'Jakob Gerhardt Blanc',
          'Listan Blanco',
          'Listan blanco de altura',
          'Listan Blanco de Canarias',
          'Listan de Huelva',
          'Listan Gacho',
          'Listan blanco ecologico',
          'Listan Negro',
          'Listan Negro en Cordón Trenzado',
          'Listan Prieto',
          'Loureira',
          'Macabeo',
          'Malvar',
          'Malvasia',
          'Malvasia aromática',
          'Malvasia de la punta de Hidalgo',
          'Malvasia de Sitges',
          'Malvasia rosada',
          'Malvasia volcánica',
          'Marfal',
          'Marmajuelo',
          'Mazuela',
          'Mencia',
          'Merenzao',
          'Merlot',
          'Merseguera',
          'Mollar Cano',
          'Monastrell',
          'Moristel',
          'Moscatel',
          'Moscatel de Alejandría',
          'Moscatel de Grano Menudo',
          'Moscatel de Hamburgo',
          'Moscatel Negro',
          'Mouraton',
          'Mulata',
          'Negramoll',
          'Negramoll de Tacoronte',
          'Palomino',
          'Palomino Fino',
          'Pardilla',
          'Pardina',
          'Parellada',
          'Pedro Ximenez',
          'Pinot Noir',
          'Planta Fina de Pedralba',
          'Prieto Picudo',
          'Queen',
          'Riesling',
          'Roseti',
          'Ruby Cabernet',
          'Ruby Seedless',
          'Rufete',
          'Sabro',
          'Sauvignon Blanc',
          'Semillon',
          'Servant',
          'Souson',
          'Sultanina',
          'Sylvaner',
          'Syrah',
          'Tempranillo',
          'Tintilla',
          'Tinto fino',
          'Treixadura',
          'Uval',
          'Ugni Blanc',
          'Varietal',
          'Verdejo',
          'Verdello',
          'Viura',
          'Vijariego',
          'Vijariego blanco',
          'Vijariego negro',
          'Xarello',
          'Zalema',
        ];
foreach($varieties as $variety){
  $id_variety = DB::table('wine_varieties')->insertGetId([
      'id' => NULL
  ]);
  foreach ($lang as $lan) {
      DB::table('wine_variety_translations')->insert([
          [
              'id_wine_variety' => $id_variety,
              'id_language' => $lan->id,
              'name' => $variety
          ]
      ]);
  }
}
      /*
        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('wine_varieties')->insert([
                'id' => NULL
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('wine_variety_translations')->insert([
                    [
                        'id_wine_variety' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_'.$varieties[$i]
                    ]
                ]);
            }
        }
        */
    }
}
