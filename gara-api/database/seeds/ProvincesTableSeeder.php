<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces=[
          'Albacete',
          'Alicante/Alacant',
          'Almería',
          'Araba/Álava',
          'Asturias',
          'Ávila',
          'Badajoz',
          'Balears, Illes',
          'Barcelona',
          'Bizkaia',
          'Burgos',
          'Cáceres',
          'Cádiz',
          'Cantabria',
          'Castellón/Castelló',
          'Ciudad Real',
          'Córdoba',
          'Coruña, A',
          'Cuenca',
          'Gipuzkoa',
          'Girona',
          'Granada',
          'Guadalajara',
          'Huelva',
          'Huesca',
          'Jaén',
          'León',
          'Lleida',
          'Lugo',
          'Madrid',
          'Málaga',
          'Murcia',
          'Navarra',
          'Ourense',
          'Palencia',
          'Palmas, Las',
          'Pontevedra',
          'Rioja, La',
          'Salamanca',
          'Santa Cruz de Tenerife',
          'Segovia',
          'Sevilla',
          'Soria',
          'Tarragona',
          'Teruel',
          'Toledo',
          'Valencia/València',
          'Valladolid',
          'Zamora',
          'Zaragoza',
          'Ceuta',
          'Melilla'
        ];
        foreach($provinces as $province){
          try{
            DB::table('provinces')->insert([
                'name' => $province
            ]);
          }catch (Exception $e){
            echo 'Ha cascado el seeder de provincias: '. $e->getMessage();
          } 
        }
    }
}
