<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>書籍登録</title>
</head>
<body>
   <main>
       <h1>書籍登録</h1>
       @if ($errors->any())
           <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
           </div>
       @endif
       <form action="{{route('book.store')}}" method="POST">
           @csrf
           <div>
               <label>カテゴリ</label>
                <select name="category_id">
                     @foreach($categories as $category)
                          <option value="{{ $category->id }}"
                          @selected($category->id == old('category_id'))>
                              {{ $category->title }}</option>
                     @endforeach
                </select>
           </div>
           <div>
               <label>タイトル</label>
               <input type="text" name="title" value="{{ old('title') }}">
           </div>
              <div>
                <label>価格</label>
                <input type="text" name="price" value="{{ old('price') }}">
              </div>
           <input type="submit" value="送信">
       </form>
   </main>
</body>
</html>
