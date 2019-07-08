<?php

use Illuminate\Support\Str;
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
             DB::table('users')->insert([
            'name' => "NightStorm",
            'email' => 'breakingaxe@gmail.com',
            'password' => bcrypt('secret'),
            'level' => "SuperAdmin",
            'status' => 'on',
        ]);


          
    }
}
