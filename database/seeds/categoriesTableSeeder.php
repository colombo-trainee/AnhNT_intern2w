<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            array(
                'name'=>'Appetisers',
            )
        ); 
        Category::create(
            array(
                'name'=>'Starters',
            )
        );
        Category::create(
            array(
                'name'=>'Main Dishes',
            )
        );
        Category::create(
            array(
                'name'=>'Salads',
            )
        );  
    }
}
