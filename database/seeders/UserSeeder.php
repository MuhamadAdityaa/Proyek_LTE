<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'umur' => '17',
                'bio' => 'Adit Ganteng',
                'alamat' => '123 Main St, Anytown, USA',
            ],
            [
                'umur' => '24',
                'bio' => 'sakahayang',
                'alamat' => '456 Elm St, Othertown, USA',
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Adit',
                'email' => 'adit@gmail.com',
                'password' => bcrypt('adit123'),
                // 'age' => 17,
                // 'bio' => 'Adit Ganteng',
                // 'alamat' => '123 Main St, Anytown, USA',
                'role_id' => 1,
                'profile_id' => 1,
            ],
            [
                'name' => 'Saka',
                'email' => 'saka@gmail.com',
                'password' => bcrypt('saka123'),
                // 'age' => 24,
                // 'bio' => 'sakahayang',
                // 'alamat' => '456 Elm St, Othertown, USA',
                'role_id' => 2,
                'profile_id' => 2,
            ],
            ]);
    }
}
