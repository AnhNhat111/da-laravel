<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoaiTkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaitaikhoan')->insert([
            'TENLOAITAIKHOAN' => 'Admin',
        ]);
        DB::table('loaitaikhoan')->insert([
            'TENLOAITAIKHOAN' => 'Nhân viên',
        ]);
        DB::table('loaitaikhoan')->insert([
            'TENLOAITAIKHOAN' => 'Khách hàng',
        ]);
    }
}