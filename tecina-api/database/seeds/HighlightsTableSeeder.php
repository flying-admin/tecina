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
                    "es" => "MENÚ DE TAPAS DOÑANA",
                    "en" => "DOÑANA TASTING MENU",
                    "de" => "DOÑANA DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                    [	'Imagen'=>'ibericos.png',	'Ingredientes'=>'Chorizo ibérico, salchichon ibérico, lomo ibérico, jamón bellota, tomate parrilla, sal maldon, pimienta negra molida, aceite virgen extra, chapata tradicion',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Selection of Iberian cold cut with rustic bread','de'=>'Auswahl an iberischem Aufschnitt mit rustikalem Brot','es'=>'Selección de embutidos ibéricos con pan rústico',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENÚ DE TAPEO" ,
                    "en" => "TAPEO TASTING MENU",
                    "de" => "TAPEO DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                   [	'Imagen'=>'croquetas.png',	'Ingredientes'=>'croqueta de bacalao cebolla caramelizada, croqueta jamon iberico pan crujiente, croquetas bacon y platano koama, croquetas de queso azul nueces, croquetas parmesano y tomate, corquetas de boletus con escamas',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Selection of 6 croquettes (1 unit of each flavour) (Iberian ham with crusty bread, blue cheese and walnuts, Parmesan with tomato, cod with caramelized onions, Boletus with potato flakes and banana with bacon)','de'=>'Zusammenstellung verschiedener Kroketten 6 St. (Iberischer Schinken mit knusprigem Brot, Blauschimmelkäse und Nüssen, Parmesan mit Tomate, Kabeljau mit karamellisierten Zwiebeln, Steinpilz mit Kartoffelflocken und Banane mit Speck)','es'=>'Surtido de croquetas 6u. (1u de cada sabor) (Jamón Ibérico con pan crujiente, Queso azul y nueces, Parmesano con tomate, Bacalao con cebolla caramelizada, Boletus con escamas de patata y Plátano con Bacon',],'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENÚ VEGANO",
                    "en" => "VEGAN TASTING MENU",
                    "de" => "VEGANER DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                  [	'Imagen'=>'ens_aguacate_mango.png',	'Ingredientes'=>'pure de maracuya, aguacates grandes, lechuga hoja roble, aceite oliva, aceite oliva virgen extra, vinagre jerez, sal maldon, cebollas rojas, brotes de sakura mix, mango congelado',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Salad of tender sprouts, avocado and mango with passion fruit vinaigrette','de'=>'Salat aus jungen Sprossen, Avocado und Mango mit Passionsfrucht Vinaigrette','es'=>'Ensalada de brotes tiernos, aguacate y mango con vinagreta de maracuyá',],'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
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
