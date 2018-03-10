<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CategorySeeder::class);
        // $this->call(ImageSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(VoteSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SubSectionSeeder::class);
        // $this->call(ImageSeeder::class);
        // $this->call(VideoSeeder::class);
    }
}
