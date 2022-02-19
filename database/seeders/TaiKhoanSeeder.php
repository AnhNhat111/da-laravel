<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taikhoan')->insert([
            'password' => Hash::make('12345678'),
            'TENHIENTHI' => 'Cham',
            'email' => 'test2@gmail.com',
            'LOAITK_ID' => 3,
        ]);
    }
}
