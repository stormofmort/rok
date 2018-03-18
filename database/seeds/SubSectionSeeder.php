<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        Storage::disk('private')->deleteDirectory('videos');
        Storage::disk('private')->makeDirectory('videos');

        Storage::disk('private')->deleteDirectory('pictures');
        Storage::disk('private')->makeDirectory('pictures');
        Storage::disk('private')->makeDirectory('pictures/thumbnails');

        Storage::disk('private')->deleteDirectory('audios');
        Storage::disk('private')->makeDirectory('audios');

        App\Section::take(2)->get()->each(function($s){
            $subsections = factory(App\Subsection::class, (int)$s->count)->states('header', 'footer')->make([
                'section_id' => $s->id
            ]);
            
            $subsections->each(function($ss, $k) {
                $ss->slot = $k;
                $subsectionable = $this->subsectionable();
                $subsectionable->save();
                $subsectionable->subsections()->save($ss);
            });
            $s->subsections()->saveMany($subsections);
        });
    }
    public function subsectionable()
    {
        $subsectionablearray=['Video', 'Image', 'Paragraph'];
        $randomelement = array_random($subsectionablearray);
        if ($randomelement == 'Video') {
            return factory(App\Video::class)->states('file', 'youtube')->make(); 
        } else if ($randomelement == 'Image') {
            return factory(App\Image::class)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]);
        } else if ($randomelement == 'Paragraph') {
            return factory(App\Paragraph::class)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]);
        }
    }
}