<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('casts')->insert([
            [
                'id' => 1,
                'name' => 'John Doe',
                'umur' => 30,
                'bio' => 'An actor known for his versatility.'
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'umur' => 28,
                'bio' => 'A talented actress with a passion for drama.'
            ],
            [
                'id' => 3,
                'name' => 'Alice Johnson',
                'umur' => 35,
                'bio' => 'An award-winning actress with a long career.'
            ],
        ]);
    }
}
