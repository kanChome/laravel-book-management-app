<x-layouts.book-manager>
    <x-slot name="title">
        書籍更新
    </x-slot>

    <h1>書籍更新</h1>
    @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :$errors />
        </x-alert>
    @endif
    <form action="{{ route('book.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>カテゴリ</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    @selected($category->id == old('category_id', $book->category_id))>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>タイトル</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}">
        </div>
        <div>
            <label>価格</label>
            <input type="text" name="price" value="{{ old('price', $book->price) }}">
        </div>
        <div>
            <label>著者</label>
            <ul>
                @foreach($authors as $author)
                    <li>
                        <label>
                            <input type="checkbox" name="authors[]"
                                   value="{{ $author->id }}"
                                @checked(in_array($author->id, old('authors', $authorIds)))>
                        </label>
                        {{ $author->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        <input type="submit" value="更新">
    </form>
</x-layouts.book-manager>
