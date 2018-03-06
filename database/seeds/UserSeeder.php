<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        
        factory(App\User::class)->states('superadmin')->create();
        factory(App\User::class, 1)->states('admin')->create();
        factory(App\User::class, 1)->states('editor')->create();
        factory(App\User::class, 1)->states('writer')->create();
        factory(App\User::class, 1)->create();
    }
}
