<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'description' => 'Description Region 1',
        ]);
        DB::table('regions')->insert([
            'description' => 'Description Region 2',
        ]);
    }
}
