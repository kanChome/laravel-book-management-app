<x-layouts.book-manager>
    <x-slot name="title">
        書籍一覧
    </x-slot>
    @if (session('message'))
        <x-alert class="info">
            {{ session('message') }}
        </x-alert>
    @endif
    <a href="{{ route('book.create') }}">新規登録</a>
    <x-book-table :$books />
</x-layouts.book-manager>

