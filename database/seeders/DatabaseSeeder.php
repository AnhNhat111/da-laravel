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
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();
        $this->call(AdminsTableSeeder::class);
=======
        $this->call(AdminTableSeeder::class);
>>>>>>> f285eedaefeed593e6f70ec81cd04010153614e3
    }
}
