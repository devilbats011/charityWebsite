<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class akhbarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\berita::class, 5)->create();
        
        factory(App\slider::class, 3)->create();

        DB::table('contactfooters')->insert([
             'address' => "address",
             'contactnumber' => "contactnumber",
             'other1' => "other1",
             'other2' => "other2",
            "created_at" =>  \Carbon\Carbon::now(), # \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # \Datetime()
        ]);

		for ($i=0; $i < 3; $i++) { 
	        DB::table('bankinfos')->insert([
            'bankname' => "bankname".$i,
            'bankaccount' => 'bankaccount'.$i,
            "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now(),
        	]);
		}

    }
}
