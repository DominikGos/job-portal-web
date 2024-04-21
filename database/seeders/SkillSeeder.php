<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skills')->truncate();
        
        DB::table('skills')->insert([
            ['content' => 'PHP', 'icon' => ''],
            ['content' => 'Java', 'icon' => ''],
            ['content' => 'C++', 'icon' => ''],
            ['content' => 'C', 'icon' => ''],
            ['content' => 'Java Script', 'icon' => ''],
        ]);
    }
}
