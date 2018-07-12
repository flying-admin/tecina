<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remove foreign key constraint
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // truncate all tables first

        DB::table('users')->truncate();
        DB::table('languages')->truncate();
        DB::table('allergens')->truncate(); DB::table('allergens_translations')->truncate();
        DB::table('food_types')->truncate(); DB::table('food_types_translations')->truncate();
        DB::table('categories')->truncate(); DB::table('categories_translations')->truncate();
        DB::table('do')->truncate();
        DB::table('wine_varieties')->truncate(); DB::table('wine_variety_translations')->truncate();
        DB::table('wine_types')->truncate(); DB::table('wine_type_translations')->truncate();
        DB::table('wines')->truncate(); DB::table('wines_translations')->truncate();
        DB::table('dishes')->truncate(); DB::table('dishes_translations')->truncate();
        DB::table('menus')->truncate(); DB::table('menus_translations')->truncate();
        DB::table('allergens_dishes')->truncate();
        DB::table('dishes_food_types')->truncate();
        DB::table('categories_dishes')->truncate();
        DB::table('wines_wine_varieties')->truncate();
        DB::table('dishes_menus')->truncate();
        DB::table('menus_wines')->truncate();
        DB::table('images')->truncate();
        DB::table('highlights')->truncate();
        DB::table('highlights_translations')->truncate();
        DB::table('provinces')->truncate();
        DB::table('wine_ages')->truncate();
        DB::table('wine_age_translations')->truncate();
        DB::table('drink_type_translations')->truncate();
        DB::table('wine_class_translations')->truncate();
        DB::table('wine_classes')->truncate();
        DB::table('drinks')->truncate();



        DB::table('drink_types')->truncate();

        // seed tables by order
        $this->call(UsersTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(DrinkTypesTableSeeder::class);
        $this->call(AllegensTableSeeder::class);
        $this->call(FoodTypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DoTableSeeder::class);
        $this->call(WineVarietiesTableSeeder::class);
        $this->call(WineTypesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        
       // $this->call(AllergensDishesTableSeeder::class);
        //$this->call(DishesFoodTypesTableSeeder::class);
        //$this->call(CategoriesDishesTableSeeder::class);
        //$this->call(WinesWineVarietiesTableSeeder::class);
        //$this->call(DishesMenusTableSeeder::class);
        //$this->call(ImagesTableSeeder::class);
        $this->call(HighlightsTableSeeder::class);
        $this->call(WineAgesTableSeeder::class);
        $this->call(WineClassesTableSeeder::class);
        $this->call(WineTableSeeder::class);
        $this->call(DrinksTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenusWinesTableSeeder::class);
        $this->call(MiscTableSeeder::class);



        //$random_quote = Quotation::inRandomOrder()->first();
    }
}
