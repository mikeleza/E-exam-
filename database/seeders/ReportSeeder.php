<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports')->insert([
            ['date' => now(), 'passed_count' => 15, 'failed_count' => 5],
            // เพิ่มข้อมูลตัวอย่างอื่น ๆ ตามต้องการ
        ]);
    }
}
