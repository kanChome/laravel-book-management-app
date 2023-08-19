<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message Sample</title>
</head>
<body>
  <main>
    <h1>メッセージ</h1>
    <ul>
      @foreach ($messages as $message)
        <li>{{ $message->body }}</li>
      @endforeach
    </ul>
  </main>
</body>
</html>