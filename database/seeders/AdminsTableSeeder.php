<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'name' => 'Test',
            'login_id' => 'test_id',
            'password' => bcrypt('password'),
        ]);

        Admin::factory()->create([
            'name' => 'Test2',
            'login_id' => 'test_id2',
            'password' => bcrypt('password'),
        ]);
    }
}
