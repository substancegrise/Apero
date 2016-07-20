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
                ['title' => 'php'],
                ['title' => 'js'],
                ['title' => 'Laravel'],
                ['title' => 'wordpress'],
                ['title' => 'symfony'],
                ['title' => 'html/css'],
            ]
        );
    }
}
