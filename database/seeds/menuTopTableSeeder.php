<?php

use Illuminate\Database\Seeder;
use App\Models\menuTop;

class menuTopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        menuTop::create(
            array(
                'name'=>'Home',
                'parent_id'=>'0',
            )        
        );
        menuTop::create(
            array(
                'name'=>'About',
                'parent_id'=>'0',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Igredients',
                'parent_id'=>'0',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Menu',
                'parent_id'=>'0',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Reviews',
                'parent_id'=>'0',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Reservations',
                'parent_id'=>'0',
            )        
        );
    }
}
