<?php

use Illuminate\Database\Seeder;
use App\models\listFood;
class listFoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         listFood::create(
            array(
                'name'=>'Bimbimbap',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'1',
                'special'=>'0',
            )        
        );
         listFood::create(
            array(
                'name'=>'Gimbap ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'1',
                'special'=>'1',
            )        
        );
          listFood::create(
            array(
                'name'=>'Hobakjuk',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'1',
                'special'=>'0',
            )        
        );
           listFood::create(
            array(
                'name'=>'Naengmyeon ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'2',
                'special'=>'0',
            )        
        );
            listFood::create(
            array(
                'name'=>'Samgyetang ',
                'image'=>'img/ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'category_id'=>'2',
                'special'=>'1',
            )        
        );
        listFood::create(
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
