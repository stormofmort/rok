<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        
        App\User::all()->each(function ($u){
            $u->articles()->saveMany(factory(App\Article::class,5)->states('published')->make());
        });

        App\User::all()->each(function ($u){
            $u->articles()->saveMany(factory(App\Article::class,5)->make());
        });
    }
}