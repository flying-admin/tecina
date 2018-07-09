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
'Abona'=>TRUE,
'Alella'=>FALSE,
'Alicante'=>FALSE,
'Almansa'=>FALSE,
'Arabako Txakolina-Txakolí/Chacolí de Álava'=>FALSE,
'Argentina'=>FALSE,
'Arlanza'=>FALSE,
'Australia'=>FALSE,
'Arribes'=>FALSE,
'Bierzo'=>FALSE,
'Binissalem-Mallorca'=>FALSE,
'Bizkaiko Txakolina-Txakolí/Chacolí de Bizkaia'=>FALSE,
'Cádiz'=>FALSE,
'Bullas'=>FALSE,
'Castilla y León'=>FALSE,
'Castilla'=>FALSE,
'Calatayud'=>FALSE,
'Campo de Borja'=>FALSE,
'Cariñena'=>FALSE,
'Catalunya'=>FALSE,
'Cava'=>FALSE,
'Champagne'=>FALSE,
'Chile'=>FALSE,
'Cigales'=>FALSE,
'Conca del Riu Anoia'=>FALSE,
'Conca de Barberá'=>FALSE,
'Condado de Huelva'=>FALSE,
'Costers del Segre'=>FALSE,
'El Hierro'=>TRUE,
'El terrerazo- Vino de pago'=>FALSE,
'Extremadura'=>FALSE,
'Empordá'=>FALSE,
'Getariako Txakolina-Txakolí/Chacolí de Guetaria'=>FALSE,
'Gran Canaria'=>TRUE,
'Vinos de España'=>FALSE,
'Jerez-Xérès-Sherry'=>FALSE,
'Jumilla'=>FALSE,
'La Gomera'=>FALSE,
'La Mancha'=>FALSE,
'La Palma'=>TRUE,
'Lanzarote'=>TRUE,
'Las Islas Canarias'=>TRUE,
'Málaga'=>FALSE,
'Manchuela'=>FALSE,
'Manzanilla Sanlúcar de Barrameda'=>FALSE,
'Méntrida'=>FALSE,
'Mondéjar'=>FALSE,
'Monterrei'=>FALSE,
'Montilla-Moriles'=>FALSE,
'Montsant'=>FALSE,
'Navarra'=>FALSE,
'Penedés'=>FALSE,
'Pla de Bages'=>FALSE,
'Pla i Llevant'=>FALSE,
'Priorat'=>FALSE,
'Rías Baixas'=>FALSE,
'Ribeira Sacra'=>FALSE,
'Ribeiro'=>FALSE,
'Ribera del Duero'=>FALSE,
'Ribera del Guadiana'=>FALSE,
'Ribera del Júcar'=>FALSE,
'Rioja'=>FALSE,
'Rueda'=>FALSE,
'Sierra de Salamanca'=>FALSE,
'Sierras de Málaga'=>FALSE,
'Somontano'=>FALSE,
'Tacoronte-Acentejo'=>FALSE,
'Tarragona'=>FALSE,
'Terra Alta'=>FALSE,
'Tierra de León'=>FALSE,
'Tierra del Vino de Zamora'=>FALSE,
'Toro'=>FALSE,
'Uclés'=>FALSE,
'Utiel-Requena'=>FALSE,
'Valdeorras'=>FALSE,
'Valdepeñas'=>FALSE,
'Valencia'=>FALSE,
'Valle Güimar'=>TRUE,
'Valle de la Orotava'=>FALSE,
'Vinos de Madrid'=>FALSE,
'Ycoden-Daute-Isora'=>TRUE,
'Yecla'=>FALSE,
];

foreach($dos as $do=>$canarias){
  DB::table('do')->insert([
      'name' => $do,
      'region' => $do,
      'canarias'=>$canarias
  ]);
}


    }
}
