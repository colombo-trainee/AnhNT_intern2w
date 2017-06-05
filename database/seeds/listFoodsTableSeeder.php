<?php

use Illuminate\Database\Seeder;
use App\Models\ListFood;
class ListFoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         ListFood::create(
            array(
                'name'=>'Bimbimbap',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'1',
                'special'=>'0',
            )        
        );
         ListFood::create(
            array(
                'name'=>'Gimbap ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'1',
                'special'=>'1',
            )        
        );
          ListFood::create(
            array(
                'name'=>'Hobakjuk',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'1',
                'special'=>'0',
            )        
        );
           ListFood::create(
            array(
                'name'=>'Naengmyeon ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'2',
                'special'=>'0',
            )        
        );
            ListFood::create(
            array(
                'name'=>'Samgyetang ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'2',
                'special'=>'1',
            )        
        );
        ListFood::create(
            array(
                'name'=>'Soondubu  ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'2',
                'special'=>'1',
            )        
        );
    }
}
