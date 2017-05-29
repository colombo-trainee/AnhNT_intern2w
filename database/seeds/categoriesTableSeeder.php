<?php

use Illuminate\Database\Seeder;
use App\models\category;
class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create(
            array(
                'name'=>'Appetisers',
            )
        ); 
        category::create(
            array(
                'name'=>'Starters',
            )
        );
        category::create(
            array(
                'name'=>'Main Dishes',
            )
        );
        category::create(
            array(
                'name'=>'Salads',
            )
        );  
    }
}
