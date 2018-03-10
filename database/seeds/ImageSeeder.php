<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        Storage::disk('private')->deleteDirectory('pictures');
        Storage::disk('private')->makeDirectory('pictures');
        Storage::disk('private')->makeDirectory('pictures/thumbnails');

        App\Article::take(3)->get()->each(function($a) {
            $a->images()->saveMany(factory(App\Image::class,2)->make([
                'user_id'=> $a->user()->first()->id
            ]));
        });
    }
}
