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
'Arabako Txakolina-Txakolí/Chacolí de Álava',
'Argentina',
'Arlanza',
'Australia',
'Arribes',
'Bierzo',
'Binissalem-Mallorca',
'Bizkaiko Txakolina-Txakolí/Chacolí de Bizkaia',
'Cádiz',
'Bullas',
'Castilla y León',
'Castilla',
'Calatayud',
'Campo de Borja',
'Cariñena',
'Catalunya',
'Cava',
'Champagne',
'Chile',
'Cigales',
'Conca del Riu Anoia',
'Conca de Barberá',
'Condado de Huelva',
'Costers del Segre',
'El Hierro',
'El terrerazo- Vino de pago',
'Extremadura',
'Empordá',
'Getariako Txakolina-Txakolí/Chacolí de Guetaria',
'Gran Canaria',
'Vinos de España',
'Jerez-Xérès-Sherry',
'Jumilla',
'La Gomera',
'La Mancha',
'La Palma',
'Lanzarote',
'Las Islas Canarias',
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
'Pla i Llevant',
'Priorat',
'Rías Baixas',
'Ribeira Sacra',
'Ribeiro',
'Ribera del Duero',
'Ribera del Guadiana',
'Ribera del Júcar',
'Rioja',
'Rueda',
'Sierra de Salamanca',
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
'Valle Güimar',
'Valle de la Orotava',
'Vinos de Madrid',
'Ycoden-Daute-Isora',
'Yecla',

        ];

foreach($dos as $do){
  DB::table('do')->insert([
      'name' => $do,
      'region' => $do
  ]);
}


    }
}
