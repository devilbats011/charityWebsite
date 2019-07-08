<?php

use Illuminate\Database\Seeder;

class usahaKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\usahakami::class, 5)->create();
    }
}
