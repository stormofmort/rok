<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->truncate();

        // $video = factory(App\Video::class)->states('file', 'youtube')->make();
        App\Article::all()->each(function($a) {
            $a->videos()->saveMany(factory(App\Video::class,5)->states('file', 'youtube')->make([
                'user_id'=> $a->user()->first()->id
            ]));
        });
    }
}
