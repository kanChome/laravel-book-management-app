<?php

namespace Database\Seeders;

use App\Models\AuthorDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ファクトリで5件の著作権情報を作成する
        // 著作情報も一緒に作成する
        AuthorDetail::factory(5)->create();
    }
}