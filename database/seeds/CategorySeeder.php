<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('article_category')->truncate();

        App\Article::take(3)->get()->each(function($a) {
            $a->categories()->saveMany(factory(App\Category::class,1)->make([
                'user_id'=> $a->user()->first()->id
            ]));
        });

        App\Category::take(3)->get()->each(function($c){
            $c->children()->saveMany(factory(App\Category::class,1)->make([
                'user_id'=> $c->user()->first()->id
            ]));
        });
    }
}
