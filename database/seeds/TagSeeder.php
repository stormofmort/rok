<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        DB::table('taggables')->truncate();

        App\Article::all()->each(function($a) {
            $a->tags()->saveMany(factory(App\Tag::class,2)->make([
                'user_id'=> $a->user()->first()->id
            ]));
        });

        App\Image::all()->each(function($i) {
            $i->tags()->saveMany(factory(App\Tag::class,2)->make([
                'user_id'=> $i->user()->first()->id
            ]));
        });
    }
}
