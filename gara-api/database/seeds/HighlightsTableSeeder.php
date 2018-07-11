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
                    ['Imagen'=>'',	'Ingredientes'=>'CALABAZA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, PIÑA MILLO FRESCA, ACEITE DE OLIVA, BATATA BLANCA, CILANTRO, BUBANGOS, ZANAHORIA, BERROS MANOJO, AJOS PELADOS, PIMIENTA PALMERA, GOFIO 7 CEREALES, PIMIENTOS ROJOS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'TRADITIONAL WATERCRESS STEW SERVED WITH GOFIO GOMERO FROM 7 CEREALS, OR GLUTEN FREE FROM CORN','de'=>'TRADITIONELLER KRESSE-EINTOPF SERVIERT MIT GOFIO GOMERO AUS 7 GETREIDEN ODER GLUTENFREI AUS MAIS','es'=>'POTAJE DE BERROS TRADICIONAL SERVIDO CON GOFIO GOMERO DE 7 CEREALES O DE MILLO SIN GLUTEN',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'TOMATE EN RAMA, VINAGRE DE JEREZ, AJOS PELADOS, ACEITE DE OLIVA VIRGEN EXTRA,MIEL PALMA, COMINOS, SAL GRUESA, ALMENDRAS FILETEADAS, CABOLLA ROJA',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BRANCH TOMATOES SALAD WITH MACHO VINEGAR DRESSING, PALM HONEY, ALMONDS AND ONION FLOWER','de'=>'STRAUCHTOMATEN SALAT MIT „MACHO“ ESSIG DRESSING, PALM HONIG, MANDELN UND ZWIEBELBLUME','es'=>'ENSALADA DE TOMATES DE RAMA CON ALIÑO DE VINAGRE MACHO, MIEL DE PALMA, ALMENDRAS Y FLOR DE CEBOLLA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'HARINA DE TRIGO, AZUCAR, CALABAZA, LEVADURA, YOGUR DE SOJA, HORTELANA MANOJO, BUBANGOS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'PUMPKIN FLOWER FROM OUR GARDEN IN CRISPY TEMPURA WITH SWEET SAUCE OF SOY YOGURT AND SPEARMINT','de'=>'KÜRBISBLÜTE AUS UNSEREM GARTEN IN KNUSPRIGEM TEMPURAMANTEL MIT SÜßER SOßE VON SOJAJOGHURT UND MINZE','es'=>'FLOR DE CALABAZA DE NUESTRA HUERTA EN TEMPURA CRUJIENTE CON SALSA DULCE DE YOGURT DE SOJA Y HIERBABUENA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'RUSSET APPLE SORBET','de'=>'RENETTE APFEL SORBET','es'=>'SORBETE DE MANZANA REINETA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'Sí',],	'translate'=>['en'=>'TIMBALE OF LEGUMEAT (MEAT SUBSTITUTE MADE WITH LEGUMES) WITH POTATOES AND CORIANDER MOJO SAUCE ON CORN MOUSSE','de'=>'TIMBAL VON LEGUMEAT (FLEISCHERSATZ MIT HÜLSENFRÜCHTEN) MIT KARTOFFELN UND KORIANDER-MOJO SAUCE AUF MAIS MOUSSE','es'=>'TIMBAL DE LEGUMEAT CON PAPAS Y MOJO DE CILANTRO SOBRE MOUSSE DE MILLO',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'SKEWER WITH PAPAYA FROM LA GOMERA AND PINEAPPLE FROM EL HIERRO ON ORANGE SYRUP AND STAR ANISE','de'=>'SPIEß MIT PAPAYA VON LA GOMERA UND ANANAS VON EL HIERRO AUF ORANGENSIRUP UND STERNANIS','es'=>'BROCHETA DE PAPAYA GOMERA Y PIÑA HERREÑA CON ALMIBAR DE NARANJA Y ANÍS ESTRELLADO',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENÚ DEGUSTACIÓN AGANDO",
                    "en" => "TASTING MENU AGANDO",
                    "de" => "DEGUSTATIONSMENÜ AGANDO"
                ],
                "dishes" => [
                    ['Imagen'=>'',	'Ingredientes'=>'CALABAZA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, QUESO AHUMADO, ACEITE DE OLIVA, MANTEQUILLA Y NATA LIQUIDA',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'VELVET OF ORGANIC PUMPKIN WITH SURPRISE PIECE OF SMOKED GOMERO CHEESE','de'=>'SAMTIGES VOM BIO-KÜRBIS MIT ÜBERRASCHUNGSSTÜCK GERÄUCHERTEM GOMERO KÄSE','es'=>'TERCIOPELO DE CALABAZA ECOLÓGICA CON TACO SORPRESA DE QUESO GOMERO AHUMADO',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'LANGOSTINOS, MILLO PALOMITAS, QUESO BLANCO GUARAPO, ACEITE OLIVA, PAPAS PAIS, MANTEQUILLA, PIMIENTA PALMERA',	'allergens'=>['crustáceos'=>'Sí','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'PRAWNS WITH PUFFED CORN TEMPURA ON BLACK POTATOES FROTH WITH BLACK PEPPER OIL FROM LA PALMA','de'=>'GARNELEN IM PUFFMAISMANTEL AUF SCHWARZEM KARTOFFELSCHAUM MIT PFEFFERÖL VON LA PALMA','es'=>'GAMBAS EN TEMPURA DE MILLO INFLADO SOBRE ESPUMA DE PAPAS NEGRAS Y ACEITE DE PIMIENTA PALMERA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'LOMO ATUN FRESCO, ACEITE OLIVA, PUERROS PAIS, AJOS PELADOS, BATATA BLANCA, VINAGRE SIDRA, SALSA SOJA, AGUACATES GRANDES, LIMONES',	'allergens'=>['crustáceos'=>'No','moluscos'=>'Sí','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'MARINATED BONITO FISH CHUNK ON SOFT AVOCADO CREAM, FRIED LEEK AND SWEET POTATO CHIPS','de'=>'MARINIERTES BONITO FISCHSTÜCK AUF SANFTER AVOCADO-CREME, GEBRATENEM LAUCH UND UND SÜßKARTOFFEL-CHIPS','es'=>'TACO DE BONITO MARINADO SOBRE CREMA SUAVE DE AGUACATE, PUERRO FRITO Y CHIPS DE BATATA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'RUSSET APPLE SORBET','de'=>'RENETTE APFEL SORBET','es'=>'SORBETE DE MANZANA REINETA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],
                    ['Imagen'=>'',	'Ingredientes'=>'SOLOMILLO, ACEITE OLIVA, CALABAZA, AJOS PELADOS, VINO TINTO, VINAGRE SIDRA, PIMIENTOS ROJOS, PIMIENTOS VERDES, PAPAS PAIS, PEREJIL, PIPAS DE CALABAZA, AZUCAR, XANTANA.',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BEEF MEDALLIONS FLAMBÉ WITH HONEY RUM ACCOMPANIED WITH MASHED PUMPKIN AND ITS ROASTED SEEDS','de'=>'RINDERMEDAILLONS MIT HONIG RUM FLAMBIERT, BEGLEITET VON KÜRBISPÜREE UND GERÖSTETEN KÜRBISSAMEN','es'=>'MEDALLONES DE BUEY FLAMBEADOS CON RON MIEL ACOMPAÑADOS DE PURÉ DE CALABAZA Y SUS PIPAS TOSTADAS',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'GOFIO MOUSSE WITH CRISPY ALMONDS','de'=>'GOFIO-MOUSSE MIT KNUSPRIGEN MANDELN','es'=>'MOUSSE DE GOFIO CON CRUJIENTE DE ALMENDRAS',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],    
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENU DEGUSTACION LAURISILVA",
                    "en" => "TASTING MENU LAURISILVA",
                    "de" => "DEGUSTATIONSMENÜ LAURISILVA"
                ],
                "dishes" => [
                    ['Imagen'=>'',	'Ingredientes'=>'CALABAZA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, PIÑA MILLO FRESCA, ACEITE DE OLIVA, BATATA BLANCA, CILANTRO, BUBANGOS, ZANAHORIA, BERROS MANOJO, AJOS PELADOS, PIMIENTA PALMERA, GOFIO 7 CEREALES, PIMIENTOS ROJOS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'TRADITIONAL WATERCRESS STEW SERVED WITH GOFIO GOMERO FROM 7 CEREALS, OR GLUTEN FREE FROM CORN','de'=>'TRADITIONELLER KRESSE-EINTOPF SERVIERT MIT GOFIO GOMERO AUS 7 GETREIDEN ODER GLUTENFREI AUS MAIS','es'=>'POTAJE DE BERROS TRADICIONAL SERVIDO CON GOFIO GOMERO DE 7 CEREALES O DE MILLO SIN GLUTEN',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'LECHUGA HOJA ROBLE, LECHUGAS PAIS, RUCULA, TOMATE CHERRY, TOMATE PARRILLA, MIEL PALMA, ACEITE EXTRA VIRGEN, ACETO BALSAMICO DUCA, ALMENDRAS FILETEADAS, QUESO BLANCO GUARAPO, CEBOLLAS ROJAS',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'WARM SALAD OF MAJORERA GOAT CHEESE','de'=>'WARMER SALAT VON MAJORERA ZIEGENKÄSE','es'=>'ENSALADA TEMPLADA DE QUESO DE CABRA MAJORERA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'Sí','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'CHERNE FRESCO, CILANTRO, PIMIENTOS VERDES, PAPAS NEGRAS, ACEITE CORRIENTE, SAL FINA, PIMIENTA PALMERA, PIMIENTOS ROJOS, PIMENTON DULCE, COMINOS, CAYENA RAMA',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'ROASTED WRECKFISH LOIN','de'=>'KNUSPRIG GEBRATENES WRACKBARSCH-FILET','es'=>'LOMO DE CHERNE ASADO CON CRUJIENTE DE SU PIEL',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'CITRUS SORBET WITH SPEARMINT','de'=>'ZITRONEN SORBET MIT MINZE','es'=>'SORBETE DE CÍTRICO CON HIERBABUENA',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],
                    ['Imagen'=>'',	'Ingredientes'=>'COSTILLAS CUBO, ACEITE OLIVA, CILANTRO, AJOS PELADOS, PIMIENTA PALMERA, VINAGRE SIDRA, PIMIENTOS VERDES, PIMIENTOS ROJOS, PAPAS PAIS, PIÑA MILLO FRESCA, MILLO DULCE LATA, NATA LIQUIDA, GELATINA LAMINA.',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'RIBS TIMBALE','de'=>'RIBCHEN TIMBAL','es'=>'TIMBAL DE COSTILLAS CON PAPAS Y MOJO DE CILANTRO',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'AZUCAR, LECHE LIQUIDA, LECHE CONDENSADA, HUEVOS, MIEL DE PALMA',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'TRADITIONAL QUESILLO GOMERO (MILK DESSERT)','de'=>'TRADITIONELLES QUESILLO GOMERO (MILCHDESSERT)','es'=>'QUESILLO TRADICIONAL GOMERO',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],    
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENU DEGUSTACION EL CEDRO",
                    "en" => "TASTING MENU EL CEDRO",
                    "de" => " DEGUSTATIONSMENÜ EL CEDRO"
                ],
                "dishes" => [
                    ['Imagen'=>'',	'Ingredientes'=>'CALABAZA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, PIÑA MILLO FRESCA, ACEITE DE OLIVA, POLLO, CILANTRO, FIDEOS FINOS, ZANAHORIAS, PEREJIL, AJOS PELADOS, PIMIENTA PALMERA, HUEVOS, PIMIENTOS ROJOS.',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'Sí','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'FINE CHICKEN STRIPES SOUP','de'=>'SUPPE MIT HÜHNERFÄDEN UND MINZE','es'=>'SOPA DE POLLO HILADO Y HIERBA HUERTO',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'LECHUGA HOJA ROBLE, LECHUGAS PAIS, RUCULA, TOMATE CHERRY, TOMATE PARRILLA, AJOS PELADOS, ACEITE EXTRA VIRGEN, ACETO BALSAMICO DUCA, BATATA BLANCA, CILANTRO, CEBOLLA ROJA, PAMPANO CONGELADO, LIMONES',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'SWEET POTATO SANDWICHES WITH WRECKFISH CRUMBS 2 UNITS','de'=>'SÜßKARTOFFEL-KANAPEES MIT WRACKBARSCH BRÖSELN 2 ST','es'=>'MONTADITOS DE BATATA CON MIGAS DE CHERNE 2U',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'PULPO, SAL GRUESA, ACEITE OLIVA, SAL MALDON, PIMENTON DULCE, PEREJIL, BATATA BLANCA',	'allergens'=>['crustáceos'=>'No','moluscos'=>'Sí','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'Sí','gluten'=>'No','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'GRILLED OCTOPUS TENTACLES','de'=>'GEGRILLTE TINTENFISCHTENTAKEL','es'=>'REJOS DE PULPO A LA PARRILLA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'PASSION FRUIT SORBET','de'=>'MARACUJA SORBET','es'=>'SORBETE DE PARCHITA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'Sí',],],
                    ['Imagen'=>'',	'Ingredientes'=>'SOLOMILLO IBERICO BLAZQUEZ, BACON CORTADO, PIÑA TROPICAL, AZUCAR, VINAGRE, CLAVO, BATATA BLANCA, ACEITE CORRIENTE, SAL FINA, AGUACATES GRANDES',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'Sí','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BLACK PORK TENDERLOIN WRAPPED IN CRISPY BACON','de'=>'SCHWARZES SCHWEINEFILET IN KNUSPRIGEM SPECKMANTEL','es'=>'BICHILLO DE COCHINO NEGRO ALBARDADO EN PANCETA CRUJIENTE',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'Sí','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'CAKE “3 LECHES” (3 TYPES OF MILK)','de'=>'KUCHEN ”3 LECHES” (3 ARTEN VON MILCH)','es'=>'TARTA DE TRES LECHES',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],    
                ],
            ],
            [ 
                "translate" => [
                    "es" => "MENU DEGUSTACION ABRANTE",
                    "en" => "TASTING MENU ABRANTE",
                    "de" => "DEGUSTATIONSMENÜ ABRANTE"
                ],
                "dishes" => [
                    ['Imagen'=>'',	'Ingredientes'=>'TOMATE PARRILLA, CEBOLLA BLANCA, PUERROS DEL PAIS, PAPAS DEL PAIS, PIÑA MILLO FRESCA, ACEITE DE OLIVA, POLLO,CILANTRO, FIDEOS FINOS, ZANAHORIA, CILANTRO, AJOS PELADOS, PIMIENTA PALMERA, HUEVOS, PIMIENTOS ROJOS. ',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'BRANCH TOMATOES CREAM','de'=>'STRAUCHTOMATEN-CREME','es'=>'CREMA DE TOMATITOS DE RAMA CON CRUJIENTE DE MILLO',],	'foodTypes'=>['Comida vegana'=>'Sí',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'BACON, CALAMAR GRANDE, NATA LIQUIDA, CEBOLLA BLANCA, PEREJIL, ALGA NORI  ',	'allergens'=>['crustáceos'=>'Sí','moluscos'=>'Sí','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'SAUTÉED SQUID NOODLES','de'=>'TINTENFISCH NUDELN','es'=>'TALLARINES DE CALAMAR',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'Sí','Carnes'=>'No','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'CABALLAS CONGELADAS, CILANTRO, CEBOLLA BLANCA, BATATA BLANCA, ACEITE CORRIENTE, SAL FINA, PIMIENTA PALMERA, PIMIENTOS ROJOS, PIMENTON DULCE, COMINOS, CAYENA RAMA, MAHONESA, PIMIENTOS VERDES, VINAGRE DE JEREZ',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'Sí','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'FRIED HORSE MACKEREL DELIGHTS','de'=>'KÖSTLICHKEITEN VOM GEBRATENEN STÖCKER','es'=>'DELICIAS DE CHICHARRO FRITAS',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'SORBET AUS ANANAS VON EL HIERRO','de'=>'SORBET OF PINEAPPLE FROM EL HIERRO','es'=>'SORBETE DE PIÑA HERREÑA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'Sí','Postres'=>'Sí',],],
                    ['Imagen'=>'',	'Ingredientes'=>'PRESA DE CERDO IBERICA, PAPAS NEGRAS, AJOS PELADOS, PIMIENTA PALMERA, ACEITE CORRIENTE, ALMENDRAS FILETEADAS, PIMIENTOS ROJOS, CILANTRO, PEREJIL, PIMENTON DULCE',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'Sí','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'Sí','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'“SECRETO IBÉRICO” (SPECIAL PORK CUT)','de'=>'SECRETO IBÉRICO (SPEZIELLES STÜCK VOM SCHWEIN)','es'=>'SECRETO DE CERDO A LA PARRILLA',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'Sí','Pescados'=>'No','Postres'=>'No',],],
                    ['Imagen'=>'',	'Ingredientes'=>'',	'allergens'=>['crustáceos'=>'No','moluscos'=>'No','dióxido de azufre y sulfitos'=>'No','altramuces'=>'No','pescado'=>'No','gluten'=>'Sí','apio'=>'No','frutos de cáscara'=>'No','cacahuetes'=>'No','huevos'=>'No','soja'=>'No','mostaza'=>'No','granos de sésamo'=>'No',],	'translate'=>['en'=>'MANGO CAKE','de'=>'MANGO-TORTE','es'=>'PASTEL DE MANGO',],	'foodTypes'=>['Comida vegana'=>'No',],	'categories'=>['Entrantes fríos'=>'No','Entrantes calientes'=>'No','Carnes'=>'No','Pescados'=>'No','Postres'=>'Sí',],],    
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
                        'description' =>  $menu['translate'][$lan->code],
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
