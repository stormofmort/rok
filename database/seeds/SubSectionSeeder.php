<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subsections')->truncate();
        App\Section::all()->each(function($s){
            $count = $s->count;
            $subsections = factory(App\Subsection::class, (int)$count)->states('header', 'footer')->make([
                'section_id' => $s->id
            ]);
            
            $subsections->each(function($ss, $k) {
                $ss->slot = ($k);
                $video = factory(App\Video::class)->states('file', 'youtube')->create();
                $video->subsections()->save($ss);
            });
            $s->subsections()->saveMany($subsections);
        });
    }
}
