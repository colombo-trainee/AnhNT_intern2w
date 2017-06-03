<?php

use Illuminate\Database\Seeder;
use App\Models\orderTable;
use Faker\Factory as Faker;
class orderTablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0 ; $i < 10; $i++) { 
        		$data = new orderTable;
	            $data->name = $faker->name;
	            $data->email = $faker->email;
	            $data->date = $faker->date($format = 'Y-m-d', $max = 'now');
	            $data->partyNumber = $faker->numberBetween($min = 1, $max = 20);
	            $data->save();
        }
    }
}
