<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CommuneSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
		    UserSeeder::class,
		    RegionSeeder::class,
		    CommuneSeeder::class,
		]);
    }
}
