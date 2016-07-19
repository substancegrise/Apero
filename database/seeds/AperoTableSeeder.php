<?php

use Illuminate\Database\Seeder;

class AperoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Apero::class, 10)->create()->each(function ($post) {
            $tagsId = [1, 2, 3]; // tags créés avant voir la classe DatabaseSeeder
            shuffle($tagsId); // mélange les clés du tableau
            $post->tags()->attach([$tagsId[0], $tagsId[1]]);
        });

    }
}
