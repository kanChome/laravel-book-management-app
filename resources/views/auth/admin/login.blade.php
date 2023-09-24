<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
</head>
<body>
    @if ($errors->any())
        <x-alert class="danger">
            <x-error-messages :errors="$errors" />
        </x-alert>
    @endif
    <form method="POST" action="{{ route('admin.create') }}">
        @csrf
        <div>
            <label for="login_id">ログインID</label>
            <input type="text" name="login_id" id="login_id" value="{{ old('login_id') }}">
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">ログイン</button>
        </div>
    </form>
</body>
</html>
