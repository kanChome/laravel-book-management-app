<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();
        $authors = Author::all();

        foreach ($books as $book) {
            $authorIds = $authors
                ->random(2) // 2件著作をランダムに抽出
                ->pluck('id') // 書籍モデルからIDのみを抽出する
                ->all();

            // 書籍に、ランダムに抜き出した2件の著作ID配列を関連づける
            $book->authors()->attach($authorIds);
        }
    }
}