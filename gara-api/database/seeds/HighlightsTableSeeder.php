<?php

use Illuminate\Database\Seeder;

class HighlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menus = [
            [ 
                "translate" => [
                    "es" => "MENÚ DE DEGUSTACION VEGANO",
                    "en" => "VEGAN TASTING MENU",
                    "de" => "VEGANES DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                  [	'Imagen'=>'flor_calabaza.png',	'Ingredientes'=>'HARINA DE TRIGO, AZUCAR, CALABAZA, LEVADURA, YOGUR DE SOJA, HORTELANA MANOJO, BUBANGOS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'PUMPKIN FLOWER FROM OUR GARDEN IN CRISPY TEMPURA WITH SWEET SAUCE OF SOY YOGURT AND SPEARMINT','de'=>'KÜRBISBLÜTE AUS UNSEREM GARTEN IN KNUSPRIGEM TEMPURAMANTEL MIT SÜßER SOßE VON SOJAJOGHURT UND MINZE','es'=>'FLOR DE CALABAZA DE NUESTRA HUERTA EN TEMPURA CRUJIENTE CON SALSA DULCE DE YOGURT DE SOJA Y HIERBABUENA',],'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENÚ DEGUSTACIÓN AGANDO",
                    "en" => "TASTING MENU AGANDO",
                    "de" => "DEGUSTATIONSMENÜ AGANDO"
                ],
                "dishes" => [
                    [	'Imagen'=>'atun.png',	'Ingredientes'=>'LOMO ATUN FRESCO, ACEITE OLIVA, PUERROS PAIS, AJOS PELADOS, BATATA BLANCA, VINAGRE SIDRA, SALSA SOJA, AGUACATES GRANDES, LIMONES',	'allergens'=>['crustáceos'=>'No','moluscos'=>'Sí','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'MARINATED BONITO FISH CHUNK ON SOFT AVOCADO CREAM, FRIED LEEK AND SWEET POTATO CHIPS','de'=>'MARINIERTES BONITO FISCHSTÜCK AUF SANFTER AVOCADO-CREME, GEBRATENEM LAUCH UND UND SÜßKARTOFFEL-CHIPS','es'=>'TACO DE BONITO MARINADO SOBRE CREMA SUAVE DE AGUACATE, PUERRO FRITO Y CHIPS DE BATATA',],'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],									],
                    ],
            ],
            [ 
                "translate" => [
                    "es" => "MENU DEGUSTACION LAURISILVA",
                    "en" => "TASTING MENU LAURISILVA",
                    "de" => "DEGUSTATIONSMENÜ LAURISILVA"
                ],
                "dishes" => [
                   [	'Imagen'=>'ensalada_queso.png',	'Ingredientes'=>'LECHUGA HOJA ROBLE, LECHUGAS PAIS, RUCULA, TOMATE CHERRY, TOMATE PARRILLA, MIEL PALMA, ACEITE EXTRA VIRGEN, ACETO BALSAMICO DUCA, ALMENDRAS FILETEADAS, QUESO BLANCO GUARAPO, CEBOLLAS ROJAS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'WARM SALAD OF MAJORERA GOAT CHEESE','de'=>'WARMER SALAT VON MAJORERA ZIEGENKÄSE','es'=>'ENSALADA TEMPLADA DE QUESO DE CABRA MAJORERA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                       ],
            ],
            [ 
                "translate" => [
                    "es" => "MENU DEGUSTACION EL CEDRO",
                    "en" => "TASTING MENU EL CEDRO",
                    "de" => " DEGUSTATIONSMENÜ EL CEDRO"
                ],
                "dishes" => [
                   [	'Imagen'=>'bichillo_cochino.png',	'Ingredientes'=>'SOLOMILLO IBERICO BLAZQUEZ, BACON CORTADO, PIÑA TROPICAL, AZUCAR, VINAGRE, CLAVO, BATATA BLANCA, ACEITE CORRIENTE, SAL FINA, AGUACATES GRANDES',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BLACK PORK TENDERLOIN WRAPPED IN CRISPY BACON','de'=>'SCHWARZES SCHWEINEFILET IN KNUSPRIGEM SPECKMANTEL','es'=>'BICHILLO DE COCHINO NEGRO ALBARDADO EN PANCETA CRUJIENTE',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],									],
                        ],
            ],
            [ 
                "translate" => [
                    "es" => "MENU DEGUSTACION ABRANTE",
                    "en" => "TASTING MENU ABRANTE",
                    "de" => "DEGUSTATIONSMENÜ ABRANTE"
                ],
                "dishes" => [                                         
                        [	'Imagen'=>'crematomate.png',	'Ingredientes'=>'TOMATE PARRILLA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, PIÑA MILLO FRESCA, ACEITE DE OLIVA, POLLO,CILANTRO, FIDEOS FINOS, ZANAHORIA, CILANTRO, AJOS PELADOS, PIMIENTA PALMERA, HUEVOS, PIMIENTOS ROJOS. ',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BRANCH TOMATOES CREAM','de'=>'STRAUCHTOMATEN-CREME','es'=>'CREMA DE TOMATITOS DE RAMA CON CRUJIENTE DE MILLO',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                  ],
            ],
        ];



        $langs =  DB::table('languages')->get();

        foreach($menus as $index => $menu){

            $highlightId = DB::table('highlights')->insertGetId([
                "image"=> $menu['dishes'][0]['Imagen'],
                "order"=> $index +1,
            ]);

            foreach ($langs as $lan) {
                DB::table('highlights_translations')->insert(
                    [
                        'id_highlight' => $highlightId,
                        'id_language' => $lan->id,
                        'name' => $menu['translate'][$lan->code],
                        'description' => '',
                    ]
                );
            }
        }

        // $lang =  DB::table('languages')->get();

        // $cant = 3;

        // for ($i = 0 ; $i < $cant ; $i++){
        //     DB::table('highlights')->insert([
        //         'image' => 'highlight_' .($i + 1). '.png',
        //         'order' => ($i + 1)
        //     ]);
        // }

        // for ($i = 0 ; $i < $cant ; $i++) {
        //     foreach ($lang as $lan) {
        //         DB::table('highlights_translations')->insert([
        //             [
        //                 'id_highlight' => $i+1,
        //                 'id_language' => $lan->id,
        //                 'name' =>$lan->code .'_name' . ($i+1),
        //                 'description' =>$lan->code .' description' . ($i+1)
        //             ]
        //         ]);
        //     }
        // }
    }
}
