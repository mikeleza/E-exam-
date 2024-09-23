<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheoreticalTestSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $traffic_sign_score = rand(0, 50);
            $traffic_line_score = rand(0, 50);
            $right_of_way_score = rand(0, 50);
            $total_score = $traffic_sign_score + $traffic_line_score + $right_of_way_score;

            DB::table('theoretical_tests')->insert([
                'user_id' => $i,
                'traffic_sign_score' => $traffic_sign_score,
                'traffic_line_score' => $traffic_line_score,
                'right_of_way_score' => $right_of_way_score,
                'total_score' => $total_score,
                'status' => $total_score > 80 ? 'ผ่าน' : 'ไม่ผ่าน',
            ]);
        }
    }
}
