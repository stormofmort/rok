<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();

        App\Article::take(5)->get()->each(function($a){
            $a->comments()->saveMany(factory(App\Comment::class, 4)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
            $a->comments()->each(function($c) {
                $c->replies()->saveMany(factory(App\Comment::class, 2)->make([
                    'user_id'=> App\User::inRandomOrder()->first()->id,
                ]));
            });
        });

        App\Image::take(3)->get()->each(function($i){
            $i->comments()->saveMany(factory(App\Comment::class, 4)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
            $i->comments()->each(function($c) {
                $c->replies()->saveMany(factory(App\Comment::class, 2)->make([
                    'user_id'=> App\User::inRandomOrder()->first()->id,
                ]));
            });
        });
    }
}
