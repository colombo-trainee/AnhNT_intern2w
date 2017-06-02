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
                'name'=>'About',
                'order'=>'1',
                'slug_name'=>'about',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Igredients',
                'order'=>'2',
                 'slug_name'=>'igredients',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Menu',
                'order'=>'3',
                 'slug_name'=>'menu',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Reviews',
                'order'=>'4',
                 'slug_name'=>'reviews',
            )        
        );
        menuTop::create(
            array(
                'name'=>'Reservations',
                'order'=>'5',
                 'slug_name'=>'reservations',
            )        
        );
    }
}
