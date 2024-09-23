<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PracticalTestSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('practical_tests')->insert([
                'user_id' => $i,
                'status' => (rand(0, 1) == 1) ? 'ผ่าน' : 'ไม่ผ่าน',
            ]);
        }
    }
}
