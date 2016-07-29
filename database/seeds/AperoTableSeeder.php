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
        
        factory(App\Apero::class, 10)->create()->each(function ($apero)  {
            
            $tagsId = [1, 2, 3, 4, 5]; // tags créés avant voir la classe DatabaseSeeder
            shuffle($tagsId); // mélange les clés du tableau

            $apero->tags()->attach([$tagsId[0], $tagsId[1]]);

            $uri = str_random(12) . '.jpg';
            
            $apero->uri = $uri;
            $apero->user_id = rand(1,3);
            $apero->category_id = rand(1,6);

            $apero->save(); // persist

            $fileName = file_get_contents('http://lorempicsum.com/futurama/350/200/' . rand(1, 9));

            $uploads = public_path(env('UPLOADS'));
            
            File::put(

                $uploads . DIRECTORY_SEPARATOR . $uri, $fileName
            );
            
            
        });
    }
}
