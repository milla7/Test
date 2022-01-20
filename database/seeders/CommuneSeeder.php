<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communes')->delete();
        DB::table('communes')->insert([
        	'id_reg' => 1,
            'description' => 'Description Commune 1',
        ]);
        DB::table('communes')->insert([
        	'id_reg' => 1,
            'description' => 'Description Commune 2',
        ]);
    }
}
