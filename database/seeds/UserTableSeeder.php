<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory(App\User::class)->create([
            'name' => 'juan leon',
            'email' => 'juansleonc@gmail.com',
            'username' => 'juanleon',
            'password' => bcrypt('qwerty123'),
            'role' => 'admin',
            'active' => 'false'
        ]);
        factory(App\User::class, 49)->create();
    }
}
