<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhysicalTestSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('physical_tests')->insert([
                'user_id' => $i,
                'color_blindness_test' => rand(0, 1) == 1,
                'long_sightedness_test' => rand(0, 1) == 1,
                'astigmatism_test' => rand(0, 1) == 1,
                'response_test' => rand(0, 1) == 1,
                'status' => (rand(0, 3) < 3) ? 'ผ่าน' : 'ไม่ผ่าน', // ผ่าน 3 ใน 4
            ]);
        }
    }
}
