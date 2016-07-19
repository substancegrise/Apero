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
            ['name' => 'asynchrone'],
            ['name' => 'VM'],
            ['name' => 'Promess'],
            ['name' => 'FastCGI'],
            ['name' => 'version'],
        ]);
    }
}