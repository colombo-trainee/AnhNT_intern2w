<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            array(
                'name'=> 'Nguyễn Tuấn Anh',
                'email'=>'anhnguyen1494@gmail.com',
                'password' => bcrypt('123456'),
            )        
        );
        User::create(
            array(
                'name'=> 'admin',
                'email'=>'admin@gmail.com',
                'password' => bcrypt('123456'),
            )        
        );
    }
}
