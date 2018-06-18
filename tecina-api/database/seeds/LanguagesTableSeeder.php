<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'code' => 'es'
            ],
            [
                'code' => 'fr',
            ],
            [
                'code' => 'en',
            ]
        ]);
    }
}
