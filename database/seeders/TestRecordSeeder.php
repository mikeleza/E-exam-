<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestRecordSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('test_records')->insert([
                'user_id' => $i,
                'physical_test_id' => $i,
                'theoretical_test_id' => $i,
                'practical_test_id' => $i,
                'overall_status' => 'ผ่านการทดสอบ',
            ]);
        }
    }
}
