<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                ['name' => 'php'],
                ['name' => 'js'],
                ['name' => 'Laravel'],
                ['name' => 'wordpress'],
                ['name' => 'symfony'],
                ['name' => 'html/css'],
            ]
        );
    }
}
