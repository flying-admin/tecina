<?php

use Illuminate\Database\Seeder;

class MiscTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('miscs')->insert(
          [
            'key'=>'highlighted_wine',
            'value'=>1
          ]
        );
    }
}
