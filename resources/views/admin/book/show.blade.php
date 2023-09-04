<x-layouts.book-manager>
    <x-slot name="title">
        書籍詳細
    </x-slot>
    <h1>書籍詳細</h1>
    <ul>
        <li>ID: {{ $book->id }}</li>
        <li>カテゴリ: {{ $book->category->title }}</li>
        <li>タイトル: {{ $book->title }}</li>
        <li>価格: {{ $book->price }}</li>
        <li>著者:
            <ul>
                @foreach($book->authors as $author)
                    <li>{{ $author->name }}</li>
                @endforeach
            </ul>
        </li>
    </ul>
    <a href="{{ route('book.index') }}">一覧に戻る</a>
</x-layouts.book-manager>
