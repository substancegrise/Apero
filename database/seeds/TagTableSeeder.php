<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'Php'],
            ['name' => 'Wordpress'],
            ['name' => 'Laravel'],
            ['name' => 'JQuery'],
            ['name' => 'Mobile'],
        ]);
    }
}