<?php

namespace Database\Seeders;

use App\Models\loaisanpham;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LoaiTkTableSeeder::class,
            AdminTableSeeder::class,
            LoaiSpTableSeeder::class,
            TaiKhoanSeeder::class,
        ]);
    }
}
