<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        // $menus = [
        //     [ 
        //         "translate" => [
        //             "es" => "MENÚ DE DEGUSTACION VEGANO",
        //             "en" => "VEGAN TASTING MENU",
        //             "de" => "VEGANES DEGUSTATIONS MENÜ"
        //         ],
        //         "dishes" => [
        //             ['Imagen'=>'',	'Ingredientes'=>'CALABAZA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, PIÑA MILLO FRESCA, ACEITE DE OLIVA, BATATA BLANCA, CILANTRO, BUBANGOS, ZANAHORIA, BERROS MANOJO, AJOS PELADOS, PIMIENTA PALMERA, GOFIO 7 CEREALES, PIMIENTOS ROJOS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'TRADITIONAL WATERCRESS STEW SERVED WITH GOFIO GOMERO FROM 7 CEREALS, OR GLUTEN FREE FROM CORN','de'=>'TRADITIONELLER KRESSE-EINTOPF SERVIERT MIT GOFIO GOMERO AUS 7 GETREIDEN ODER GLUTENFREI AUS MAIS','es'=>'POTAJE DE BERROS TRADICIONAL SERVIDO CON GOFIO GOMERO DE 7 CEREALES O DE MILLO SIN GLUTEN',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
        //             ['Imagen'=>'',	'Ingredientes'=>'TOMATE EN RAMA, VINAGRE DE JEREZ, AJOS PELADOS, ACEITE DE OLIVA VIRGEN EXTRA,MIEL PALMA, COMINOS, SAL GRUESA, ALMENDRAS FILETEADAS, CABOLLA ROJA',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BRANCH TOMATOES SALAD WITH MACHO VINEGAR DRESSING, PALM HONEY, ALMONDS AND ONION FLOWER','de'=>'STRAUCHTOMATEN SALAT MIT „MACHO“ ESSIG DRESSING, PALM HONIG, MANDELN UND ZWIEBELBLUME','es'=>'ENSALADA DE TOMATES DE RAMA CON ALIÑO DE VINAGRE MACHO, MIEL DE PALMA, ALMENDRAS Y FLOR DE CEBOLLA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
        //             ['Imagen'=>'',	'Ingredientes'=>'HARINA DE TRIGO, AZUCAR, CALABAZA, LEVADURA, YOGUR DE SOJA, HORTELANA MANOJO, BUBANGOS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'PUMPKIN FLOWER FROM OUR GARDEN IN CRISPY TEMPURA WITH SWEET SAUCE OF SOY YOGURT AND SPEARMINT','de'=>'KÜRBISBLÜTE AUS UNSEREM GARTEN IN KNUSPRIGEM TEMPURAMANTEL MIT SÜßER SOßE VON SOJAJOGHURT UND MINZE','es'=>'FLOR DE CALABAZA DE NUESTRA HUERTA EN TEMPURA CRUJIENTE CON SALSA DULCE DE YOGURT DE SOJA Y HIERBABUENA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
        //             ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'RUSSET APPLE SORBET','de'=>'RENETTE APFEL SORBET','es'=>'SORBETE DE MANZANA REINETA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],
        //             ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'Sí',],	'translate'=>['en'=>'TIMBALE OF LEGUMEAT (MEAT SUBSTITUTE MADE WITH LEGUMES) WITH POTATOES AND CORIANDER MOJO SAUCE ON CORN MOUSSE','de'=>'TIMBAL VON LEGUMEAT (FLEISCHERSATZ MIT HÜLSENFRÜCHTEN) MIT KARTOFFELN UND KORIANDER-MOJO SAUCE AUF MAIS MOUSSE','es'=>'TIMBAL DE LEGUMEAT CON PAPAS Y MOJO DE CILANTRO SOBRE MOUSSE DE MILLO',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],],
        //             ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'SKEWER WITH PAPAYA FROM LA GOMERA AND PINEAPPLE FROM EL HIERRO ON ORANGE SYRUP AND STAR ANISE','de'=>'SPIEß MIT PAPAYA VON LA GOMERA UND ANANAS VON EL HIERRO AUF ORANGENSIRUP UND STERNANIS','es'=>'BROCHETA DE PAPAYA GOMERA Y PIÑA HERREÑA CON ALMIBAR DE NARANJA Y ANÍS ESTRELLADO',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],
        //         ],
        //     ],
        // ];



        // $langs =  DB::table('languages')->get();

        // foreach($menus as $menu){

        //     $menuId = DB::table('menus')->insertGetId([
        //         "image"=> '',
        //         "active"=> 1,
        //     ]);

        //     foreach ($langs as $lan) {
        //         DB::table('menus_translations')->insert(
        //             [
        //                 'id_menu' => $menuId,
        //                 'id_language' => $lan->id,
        //                 'name' => $menu['translate'][$lan->code],
        //                 'description' => ''
        //             ]
        //         );
        //     }
            
        //     foreach( $menu['dishes'] as $plato){

        //             $id_dish =  DB::table('dishes_translations')->where('name', $plato['translate']['es'])->first()->id_dish;
                
        //             try{    
        //                 DB::table('dishes_menus')->insert(
        //                     [
        //                         'id_dish' => $id_dish,
        //                         'id_menu' => $menuId
        //                     ]
        //                 );
        //             }catch(Exception $e){
        //                 echo '
        //                 ERROR:'.$e->getMessage();
        //                 print_r($menu);
        //             }

        //     }

        // }

        // $lang =  DB::table('languages')->get();

        // $cant = 5;

        // for ($i = 0 ; $i < $cant ; $i++){
        //    $menuID = DB::table('menus')->insertGetId([
        //         'image' => 'menu_' . ($i+1) . '.png',
        //         'active'=> TRUE
        //     ]);
       
        //     foreach ($lang as $lan) {
        //         DB::table('menus_translations')->insert([
        //             [
        //                 'id_menu' => $menuID,
        //                 'id_language' => $lan->id,
        //                 'name' =>$lan->code .'_name' . ($i+1),
        //                 'description' =>$lan->code .'-description' . ($i+1)
        //             ]
        //         ]);
        //     }
        // }
    }
}
