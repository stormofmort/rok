<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();
        DB::table('imageables')->truncate();

        App\Article::all()->each(function($a) {
            $a->images()->saveMany(factory(App\Image::class,5)->make([
                'user_id'=> $a->user()->first()->id
            ]));
        });
    }
}
