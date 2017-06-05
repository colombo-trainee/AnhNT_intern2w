<?php

use Illuminate\Database\Seeder;
use App\Models\MenuTop;

class MenuTopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuTop::create(
            array(
                'name'=>'About',
                'order'=>'1',
                'slug_name'=>'about',
            )        
        );
        MenuTop::create(
            array(
                'name'=>'Igredients',
                'order'=>'2',
                 'slug_name'=>'igredients',
            )        
        );
        MenuTop::create(
            array(
                'name'=>'Menu',
                'order'=>'3',
                 'slug_name'=>'menu',
            )        
        );
        MenuTop::create(
            array(
                'name'=>'Reviews',
                'order'=>'4',
                 'slug_name'=>'reviews',
            )        
        );
        MenuTop::create(
            array(
                'name'=>'Reservations',
                'order'=>'5',
                 'slug_name'=>'reservations',
            )        
        );
    }
}
