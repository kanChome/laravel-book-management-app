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
        <x-book-form :$categories :$book :$authors :$authorIds />
        <input type="submit" value="更新">
    </form>
</x-layouts.book-manager>
