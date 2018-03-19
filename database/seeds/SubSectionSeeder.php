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
        DB::table('videos')->truncate();

        Storage::disk('private')->deleteDirectory('pictures');
        Storage::disk('private')->makeDirectory('pictures');
        Storage::disk('private')->makeDirectory('pictures/thumbnails');
        DB::table('images')->truncate();
        DB::table('galleries')->truncate();

        Storage::disk('private')->deleteDirectory('audios');
        Storage::disk('private')->makeDirectory('audios');
        DB::table('audios')->truncate();

        DB::table('polls')->truncate();
        DB::table('paragraphs')->truncate();

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
        $subsectionablearray=['Video', 'Image', 'Paragraph', 'Gallery', 'Audio', 'Poll','Statistic'];
        $randomelement = array_random($subsectionablearray);
        if ($randomelement == 'Video') {
            return factory(App\Video::class)->states('file', 'youtube')->make([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]); 
        } else if ($randomelement == 'Image') {
            return factory(App\Image::class)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]);
        } else if ($randomelement == 'Paragraph') {
            return factory(App\Paragraph::class)->make([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]);
        } else if ($randomelement == 'Gallery') {
            $gallery = factory(App\Gallery::class)->create([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]);
            $gallery->images()->saveMany(App\Image::take(10)->get());
            return $gallery;
        } else if ($randomelement == 'Audio') {
            return factory(App\Audio::class)->states('file')->make([
                'user_id'=> App\User::inRandomOrder()->first()->id
            ]);
        } else if ($randomelement == 'Poll') {
            $poll = factory(App\Poll::class)->create([
                'user_id'=>  App\User::inRandomOrder()->first()->id
            ]);
            $poll->options()->saveMany(factory(App\PollOption::class, 4)->make());
            return $poll;
        } else if ($randomelement == 'Quote') { 
            $author = factory(App\Author::class)->create([
                'user_id'=>  App\User::inRandomOrder()->first()->id
            ]);
            return factory(App\Poll::class)->make([
                'user_id'=>  App\User::inRandomOrder()->first()->id,
                'author_id'=> $author->id
            ]);
        } else if ($randomelement == 'Statistic') {
            return factory(App\Statistic::class)->make([
                'user_id'=>  App\User::inRandomOrder()->first()->id
            ]);
        }
    }
}