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
        App\Article::where('status', true)->take(3)->get()->each(function($a) {
            $a->votes()->saveMany(factory(App\Vote::class, 3)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
        App\User::take(3)->get()->each(function($u) {
            $u->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
        App\Comment::take(3)->get()->each(function($c) {
            $c->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
        App\Image::take(3)->get()->each(function($i) {
            $i->votes()->saveMany(factory(App\Vote::class, 6)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id,
            ]));
        });
    }
}
