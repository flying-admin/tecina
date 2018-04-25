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

        $cant = 48;

        $varieties = [
            'Airén',
            'Alarije',
            'Albarín Blanco',
            'Albariño',
            'Albillo',
            'Alcañon',
            'Borba',
            'Caiño Blanco',
            'Calagraño',
            'Cariñena Blanca',
            'Cayetana',
            'Chardonnay',
            'Chenín Blanco',
            'Doña Blanca',
            'Escanyavella',
            'Esquitxagos',
            'Folle Blanque',
            'Forastera Blanca',
            'Garnacha Blanca',
            'Garnacha Gri',
            'Garrido Fino',
            'Gewürztraminer',
            'Giró Blanco',
            'Godello',
            'Gual',
            'Hondarribi Zuri',
            'Hondarribi Zuri Zerrate',
            'Incroccio Manzoni',
            'Jaén Blanca',
            'Jaumillo',
            'Lado',
            'Lairén',
            'Listán Blanco',
            'Loureira Blanca',
            'Macabeo',
            'Malvar',
            'Malvasía',
            'Marmajuelo',
            'Marsanne',
            'Merseguera',
            'Moll',
            'Montónega',
            'Moscatel de Alejandría',
            'Moscatel de Frontignon',
            'Moscatel de Grano Menudo',
            'Moscatel de Italia',
            'Moza Fresca',
            'Müller Thurgau',
            'Muscat'
        ];

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('wine_varieties')->insert([
                'id' => NULL
            ]);
        }

        for ($i = 0 ; $i < $cant ; $i++) {
            foreach ($lang as $lan) {
                DB::table('wine_varieties_translations')->insert([
                    [
                        'id_wine_variety' => $i+1,
                        'id_language' => $lan->id,
                        'name' =>$lan->code .'_'.$varieties[$i]
                    ]
                ]);
            }
        }
    }
}
