<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $faker = Faker::create();
        for($i =0 ;$i< 10;$i++){
            admin::create([  
                   'LOAITK_ID' => rand(1,2),
                   'email' => $faker->email,
                   'password' => bcrypt('12345678'),
                   'TENHIENTHI' => $faker->firstName(),
                   'SODIENTHOAI' => '0123456789',     
                   'TRANGTHAI' => 1,
                   'DIACHI' => $faker->address()
               ]);
         }
    }
}
