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
                'image'=>'ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'id_category'=>'1',
                'special'=>'0',
            )        
        );
         listFood::create(
            array(
                'name'=>'Gimbap ',
                'image'=>'ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'id_category'=>'1',
                'special'=>'1',
            )        
        );
          listFood::create(
            array(
                'name'=>'Hobakjuk',
                'image'=>'ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'id_category'=>'1',
                'special'=>'0',
            )        
        );
           listFood::create(
            array(
                'name'=>'Naengmyeon ',
                'image'=>'ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'id_category'=>'2',
                'special'=>'0',
            )        
        );
            listFood::create(
            array(
                'name'=>'Samgyetang ',
                'image'=>'ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'id_category'=>'2',
                'special'=>'1',
            )        
        );
        listFood::create(
            array(
                'name'=>'Soondubu  ',
                'image'=>'ss-about1.png',
                'price'=>'3.99',
                'description'=>'rất ngon',
                'id_category'=>'2',
                'special'=>'1',
            )        
        );
    }
}
