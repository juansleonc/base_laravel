<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        factory('App\Post', 'active', 5)->create();
        factory('App\Post', 'inactive', 5)->create();
    }
}
