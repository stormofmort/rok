<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->truncate();
        App\Article::all()->each(function($a) {
            $sections = factory(App\Section::class,4)->states('single', 'double_equal', 'double_left', 'double_right', 'triple_equal','triple_left', 'triple_right', 'triple_unequal', 'four')->make();   
            $sections->each(function($s, $k) {
                $s->slot = ($k);
            });
            $a->sections()->saveMany($sections);
        });
    }
}
