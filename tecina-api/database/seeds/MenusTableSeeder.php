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



        $menus = [
            [ 
                "translate" => [
                    "es" => "MENÚ DE TAPAS DOÑANA",
                    "en" => "DOÑANA TASTING MENU",
                    "de" => "DOÑANA DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                    [	'Imagen'=>'ibericos.png',	'Ingredientes'=>'Chorizo ibérico, salchichon ibérico, lomo ibérico, jamón bellota, tomate parrilla, sal maldon, pimienta negra molida, aceite virgen extra, chapata tradicion',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Selection of Iberian cold cut with rustic bread','de'=>'Auswahl an iberischem Aufschnitt mit rustikalem Brot','es'=>'Selección de embutidos ibéricos con pan rústico',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                [	'Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'','moluscos'=>'','dióxido de azufre y sulfitos'=>'','altramuces'=>'','pescado'=>'','gluten'=>'','apio'=>'','frutos de cáscara'=>'','cacahuetes'=>'','huevos'=>'','soja'=>'','mostaza'=>'','granos de sésamo'=>'',],	'translate'=>['en'=>'','de'=>'','es'=>'Anchoas con sal de ajo y tostadas de pan con tomate en AVOE',],	'foodTypes'=>['Comida vegana'=>'',],	'categories'=>['Entrantes fríos'=>'','Entrantes calientes'=>'','Carnes'=>'','Pescados'=>'','Postres'=>'',],									],
                [	'Imagen'=>'garbanzo.png',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'','moluscos'=>'','dióxido de azufre y sulfitos'=>'','altramuces'=>'','pescado'=>'','gluten'=>'','apio'=>'','frutos de cáscara'=>'','cacahuetes'=>'','huevos'=>'','soja'=>'','mostaza'=>'','granos de sésamo'=>'',],	'translate'=>['en'=>'','de'=>'','es'=>'Cazuela de Fabada Asturiana (Receta Tradicional)',],	'foodTypes'=>['Comida vegana'=>'',],	'categories'=>['Entrantes fríos'=>'','Entrantes calientes'=>'','Carnes'=>'','Pescados'=>'','Postres'=>'',],									],
                [	'Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'','moluscos'=>'','dióxido de azufre y sulfitos'=>'','altramuces'=>'','pescado'=>'','gluten'=>'','apio'=>'','frutos de cáscara'=>'','cacahuetes'=>'','huevos'=>'','soja'=>'','mostaza'=>'','granos de sésamo'=>'',],	'translate'=>['en'=>'','de'=>'','es'=>'Calandracas (Envueltos fritos de Chorizo fresco y queso en tempura)',],	'foodTypes'=>['Comida vegana'=>'',],	'categories'=>['Entrantes fríos'=>'','Entrantes calientes'=>'','Carnes'=>'','Pescados'=>'','Postres'=>'',],									],
                [	'Imagen'=>'bilbaina.png',	'Ingredientes'=>'ajos pelados, perejil, sal fina, lomo bacalao, laurel, harina de trigo, papas negras, aceite corriente, aceite oliva, cayena rama',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Cod‐Fillet Bilbao style with black potatoes','de'=>'Kabeljaufilet Bilbaíner Art mit schwarzen Kartoffeln','es'=>'Filete de Bacalao a la Bilbaína con papas negras',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],									],
                [	'Imagen'=>'entrecot.png',	'Ingredientes'=>'ajos pelados, perejil, sal fina, entrecot añojo, pimienta negra, papas arrugadas, brandy corriente, huevos, aceite oliva, ajetes bandeja',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Beefsteak medium with roasted potatoes and aioli','de'=>'Auf den Punkt gebratenes Kalbsteak mit Bratkartoffeln und Aioli','es'=>'Lomo de Ternera al punto con patatas asadas y Alioli',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],									],
                    
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENÚ DE TAPEO" ,
                    "en" => "TAPEO TASTING MENU",
                    "de" => "TAPEO DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                    [	'Imagen'=>'ibericos.png',	'Ingredientes'=>'Chorizo ibérico, salchichon ibérico, lomo ibérico, jamón bellota, tomate parrilla, sal maldon, pimienta negra molida, aceite virgen extra, chapata tradicion',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Selection of Iberian cold cut with rustic bread','de'=>'Auswahl an iberischem Aufschnitt mit rustikalem Brot','es'=>'Selección de embutidos ibéricos con pan rústico',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'pimientos.png',	'Ingredientes'=>'aceite de olvia, sal maldon, pimientos del padron',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Padrón peppers','de'=>'Paprika aus Padrón','es'=>'Pimientos de Padrón',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'salmorejo.png',	'Ingredientes'=>'Tomate parrilla, ajos pelados, aguacates grandes, borraja fresca, agua, aceite oliva, vinagre jerez, sal fina, jamon bellota.',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Salmorejo of organic tomato in EVOO*, slices of Iberian ham and avocado','de'=>'Salmorejo aus Bio‐Tomaten mit NOE*, Scheiben vom iberischen Schinken und Avocado','es'=>'Salmorejo de tomate ecológico con AOVE, lascas de jamón ibérico y aguacate',],'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'cazuelita_chori.png',	'Ingredientes'=>'ajos pelados, chistorras, vino blanco, jugo manzana, laurel, aceite oliva, chapata tradicion',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Chorizo in Cider Casserole with bread sticks','de'=>'Casserole mit Chorizo in Cidre und Brotstückchen','es'=>'Cazuela de chorizo a la sidra con picos de pan',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'croquetas.png',	'Ingredientes'=>'croqueta de bacalao cebolla caramelizada, croqueta jamon iberico pan crujiente, croquetas bacon y platano koama, croquetas de queso azul nueces, croquetas parmesano y tomate, corquetas de boletus con escamas',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Selection of 6 croquettes (1 unit of each flavour) (Iberian ham with crusty bread, blue cheese and walnuts, Parmesan with tomato, cod with caramelized onions, Boletus with potato flakes and banana with bacon)','de'=>'Zusammenstellung verschiedener Kroketten 6 St. (Iberischer Schinken mit knusprigem Brot, Blauschimmelkäse und Nüssen, Parmesan mit Tomate, Kabeljau mit karamellisierten Zwiebeln, Steinpilz mit Kartoffelflocken und Banane mit Speck)','es'=>'Surtido de croquetas 6u. (1u de cada sabor) (Jamón Ibérico con pan crujiente, Queso azul y nueces, Parmesano con tomate, Bacalao con cebolla caramelizada, Boletus con escamas de patata y Plátano con Bacon',],'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'tosta_langostinos.png',	'Ingredientes'=>'ajos pelados, perejil, sal final, langostinos, laurel, tomate parrilla, brnady corriente, chapata tradicion, aceite oliva, cayena rama',	'allergens'=>['crustáceos'=>'Sí','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Tiger prawns with garlic and chilli served with bread toasts 5 units','de'=>'Tiger Garnelen mit Knoblauch und Chili serviert mit Toastbrot 5 St.','es'=>'Langostinos tigre con ajo y guindilla servidos con tostas de pan 5u',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],									],
                    [	'Imagen'=>'entrecot.png',	'Ingredientes'=>'ajos pelados, perejil, sal fina, entrecot añojo, pimienta negra, papas arrugadas, brandy corriente, huevos, aceite oliva, ajetes bandeja',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Beefsteak medium with roasted potatoes and aioli','de'=>'Auf den Punkt gebratenes Kalbsteak mit Bratkartoffeln und Aioli','es'=>'Lomo de Ternera al punto con patatas asadas y Alioli',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'','moluscos'=>'','dióxido de azufre y sulfitos'=>'','altramuces'=>'','pescado'=>'','gluten'=>'','apio'=>'','frutos de cáscara'=>'','cacahuetes'=>'','huevos'=>'','soja'=>'','mostaza'=>'','granos de sésamo'=>'',],	'translate'=>['en'=>'','de'=>'','es'=>'Arroz con leche',],	'foodTypes'=>['Comida vegana'=>'',],	'categories'=>['Entrantes fríos'=>'','Entrantes calientes'=>'','Carnes'=>'','Pescados'=>'','Postres'=>'',],									],
                 ],
            ],
            [ 
                "translate" => [
                    "es" => "MENÚ VEGANO",
                    "en" => "VEGAN TASTING MENU",
                    "de" => "VEGANER DEGUSTATIONS MENÜ"
                ],
                "dishes" => [
                    [	'Imagen'=>'pimientos.png',	'Ingredientes'=>'aceite de olvia, sal maldon, pimientos del padron',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Padrón peppers','de'=>'Paprika aus Padrón','es'=>'Pimientos de Padrón',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'ens_aguacate_mango.png',	'Ingredientes'=>'pure de maracuya, aguacates grandes, lechuga hoja roble, aceite oliva, aceite oliva virgen extra, vinagre jerez, sal maldon, cebollas rojas, brotes de sakura mix, mango congelado',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Salad of tender sprouts, avocado and mango with passion fruit vinaigrette','de'=>'Salat aus jungen Sprossen, Avocado und Mango mit Passionsfrucht Vinaigrette','es'=>'Ensalada de brotes tiernos, aguacate y mango con vinagreta de maracuyá',],'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'puerros.png',	'Ingredientes'=>'puerros pais, ajos pelados, perejil, tomate ensalada, aceite oliva, aceite oliva virgen extra ajo, vinagre jerez, sal maldon, pimienta negra grano, brotes de sakura mix, piñones',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Caramelized leeks with fruits trail vanaigrette','de'=>'Karamellisierter Porree mit Vinaigrette aus Trockenfrüchten','es'=>'Puerros caramelizados con vinagreta de frutos secos',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'setas.png',	'Ingredientes'=>'Setas, ajos pelados, aceite corriente, boletus desidratadas, pimienta negra molida, aceite oliva, champiñones enteros, brotes de sakura mix, perejil',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Sauteed mushrooms with garlic','de'=>'Saute von Pilzen mit jungem Knoblauch','es'=>'Salteado de setas y hongos con ajos tiernos',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'esparragos.png',	'Ingredientes'=>'esparragos trigueros frescos, ajos pelados, aceite corriente, boletus desidratadas, pimienta negra, aceite oliva, tomate parrilla, brotes de sakura mix, perejil, vinagre, almendras fileteadas, harina de trigo,, levadura prensada',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Wild asparagus in tempura with Romesco sauce','de'=>'Grüne Spargel im Teigmantel mit Romesco Sauce','es'=>'Espárragos trigueros en tempura con salsa romescu',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'legumeat.png',	'Ingredientes'=>'carne vegetal, perejil, chapata tradicion, leche de soja, cebolla blanca, ajos pelados, gelificante vegetal, sal fina, vino blanco, pimienta negra, tomate natural, papas pais, aceite corriente, aceite oliva',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'Sí',],	'translate'=>['en'=>'Meatballs of Legumeat (meat substitute made with legumes) with homemade tomato sauce and chips','de'=>'Legumeat (Fleischersatz aus Gemüse) Frikadellen mit hausgemachter Tomatensauce und Pommes Frites','es'=>'Albóndigas de Legumeat con salsa casera de tomate y patatas fritas',],'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],									],
                    [	'Imagen'=>'brocheta.png',	'Ingredientes'=>'papayas, mango congelado, kiwi redondo, melon verde, piña platanos, azucar',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'Seasonal fruit skewer caramelized with cane sugar','de'=>'Bratspieß vom Obst der Saison mit karamellisiertem Rohrzucker','es'=>'Brocheta de fruta de temporada caramelizada con azúcar de caña',],'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],									],
               
                ],
            ],
        ];

                                                          
                                                          


												
												



        $langs =  DB::table('languages')->get();

        foreach($menus as $menu){

            $menuId = DB::table('menus')->insertGetId([
                "image"=> '',
                "active"=> 1,
            ]);

            foreach ($langs as $lan) {
                DB::table('menus_translations')->insert(
                    [
                        'id_menu' => $menuId,
                        'id_language' => $lan->id,
                        'name' => $menu['translate'][$lan->code],
                        'description' => ''
                    ]
                );
            }
            
            foreach( $menu['dishes'] as $plato){

                    print_r($plato['translate']['es']);
                    $id_dish =  DB::table('dishes_translations')->where('name', $plato['translate']['es'])->first()->id_dish;
                
                    try{    
                        DB::table('dishes_menus')->insert(
                            [
                                'id_dish' => $id_dish,
                                'id_menu' => $menuId
                            ]
                        );
                    }catch(Exception $e){
                        echo '
                        ERROR:'.$e->getMessage();
                        print_r($menu);
                    }

            }

        }

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
