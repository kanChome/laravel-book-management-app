<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookPostRequest;
use App\Http\Requests\BookPutRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): Response
    {
        $books = Book::with('category')
            ->orderBy('category_id')
            ->orderBy('title')
            ->get();

        return response()
            ->view('admin.book.index', ['books' => $books])
            ->header('Content-Type', 'text/html')
            ->header('Content-Encoding', 'UTF-8');
    }

    public function show(Book $book): View
    {
        Log::info('書籍詳細情報が参照されました。ID=' . $book->id);
        return view('admin.book.show', compact('book'));
    }

    public function create(): View
    {
        // カテゴリー一覧を表示するために全件取得
        $categories = Category::all();

        // 著者一覧を表示するために全件取得
        $authors = Author::all();

        return view('admin.book.create',
            compact('categories', 'authors'));
    }

    public function store(BookPostRequest $request): RedirectResponse
    {
        $book = new Book();

        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->price = $request->price;

        DB::transaction(function () use ($book, $request) {
            // 本を保存
            $book->save();
            // 著者を保存s
            $book->authors()->attach($request->authors);
        });

        return redirect()
            ->route('book.index')
            ->with('message', $book->title . 'を登録しました');
    }

    public function edit(Book $book): View
    {
        // カテゴリー一覧を表示するために全件取得
        $categories = Category::all();

        // 著者一覧を表示するために全件取得
        $authors = Author::all();

        $authorIds = $book->authors->pluck('id')->all();

        return view('admin.book.edit',
            compact('book', 'categories', 'authors', 'authorIds'));
    }

    public function update(BookPutRequest $request, Book $book): RedirectResponse
    {
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->price = $request->price;

        DB::transaction(function () use ($book, $request) {
            // 本を更新
            $book->update();
            // 著者を保存
            $book->authors()->sync($request->authors);
        });

        return redirect()
            ->route('book.index')
            ->with('message', $book->title . 'を更新しました');
    }

    public function destroy(Book $book): RedirectResponse
    {
        // 本を削除
        $book->delete();

        return redirect()
            ->route('book.index')
            ->with('message', $book->title . 'を削除しました');
    }
}
