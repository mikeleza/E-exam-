<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserInfoSeeder::class,
            PhysicalTestSeeder::class,
            TheoreticalTestSeeder::class,
            PracticalTestSeeder::class,
            ReportSeeder::class,
            TestRecordSeeder::class,
        ]);
    }
}
