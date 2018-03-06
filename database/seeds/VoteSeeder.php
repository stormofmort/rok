<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->truncate();
        App\Article::where('status', true)->get()->each(function($a) {
            $a->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
        App\User::all()->each(function($u) {
            $u->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
        App\Comment::all()->each(function($c) {
            $c->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
        App\Image::all()->each(function($i) {
            $i->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
    }
}
