<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): Collection
    {
        return Book::all();
    }

    public function show(string $id): Book
    {
        return Book::findOrFail($id);
    }
}
