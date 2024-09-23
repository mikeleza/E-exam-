<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInfoSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_info')->insert([
            ['first_name' => 'John', 'last_name' => 'Doe'],
            ['first_name' => 'Jane', 'last_name' => 'Smith'],
            ['first_name' => 'Michael', 'last_name' => 'Johnson'],
            ['first_name' => 'Emily', 'last_name' => 'Davis'],
            ['first_name' => 'Chris', 'last_name' => 'Brown'],
            ['first_name' => 'Jessica', 'last_name' => 'Williams'],
            ['first_name' => 'Matthew', 'last_name' => 'Jones'],
            ['first_name' => 'Ashley', 'last_name' => 'Garcia'],
            ['first_name' => 'David', 'last_name' => 'Martinez'],
            ['first_name' => 'Sarah', 'last_name' => 'Hernandez'],
            ['first_name' => 'Daniel', 'last_name' => 'Lopez'],
            ['first_name' => 'Sophia', 'last_name' => 'Wilson'],
            ['first_name' => 'Andrew', 'last_name' => 'Anderson'],
            ['first_name' => 'Olivia', 'last_name' => 'Thomas'],
            ['first_name' => 'Joshua', 'last_name' => 'Taylor'],
            ['first_name' => 'Ava', 'last_name' => 'Moore'],
            ['first_name' => 'Ethan', 'last_name' => 'Jackson'],
            ['first_name' => 'Mia', 'last_name' => 'Martin'],
            ['first_name' => 'James', 'last_name' => 'Lee'],
            ['first_name' => 'Isabella', 'last_name' => 'Perez'],
        ]);
    }
}
