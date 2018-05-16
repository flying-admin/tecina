<?php

use Illuminate\Database\Seeder;

class DoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cant = 69;

        $dos = [
            'Abona',
            'Alella',
            'Alicante',
            'Almansa',
            'Arlanza',
            'Arribes',
            'Bierzo',
            'Binissalem-Mallorca',
            'Bullas',
            'Calatayud',
            'Campo de Borja',
            'Cangas',
            'Cariñena',
            'Cataluña',
            'Cava',
            'Chacolí de Álava',
            'Chacolí de Getaria',
            'Chacolí de Vizcaya',
            'Cigales',
            'Conca de Barberá',
            'Condado de Huelva',
            'Costers del Segre',
            'El Hierro',
            'Empord',
            'Gran Canaria',
            'Jerez-Xérés-Sherry',
            'Jumilla',
            'La Gomera',
            'La Mancha',
            'La Palma',
            'Lanzarote',
            'Málaga',
            'Manchuela',
            'Manzanilla Sanlúcar de Barrameda',
            'Méntrida',
            'Mondéjar',
            'Monterrei',
            'Montilla-Moriles',
            'Montsant',
            'Navarra',
            'Penedés',
            'Pla de Bages',
            'Pla de Llevant',
            'Priorat',
            'Rías Baixas',
            'Ribeira Sacra',
            'Ribeiro',
            'Ribera del Duero',
            'Ribera del Guadiana',
            'Ribera del Júcar',
            'Rioja',
            'Rueda',
            'Sierras de Málaga',
            'Somontano',
            'Tacoronte-Acentejo',
            'Tarragona',
            'Terra Alta',
            'Tierra de León',
            'Tierra del Vino de Zamora',
            'Toro',
            'Uclés',
            'Utiel-Requena',
            'Valdeorras',
            'Valdepeñas',
            'Valencia',
            'Valle de Güimar',
            'Valle de la Orotava',
            'Vinos de Madrid',
            'Ycoden-Daute-Isora',
            'Yecla'
        ];

        for ($i = 0 ; $i < $cant ; $i++){
            DB::table('do')->insert([
                'name' => 'do name'. ($i+1),
                'region' => 'do region '. ($i+1),
            ]);
        }

    }
}
