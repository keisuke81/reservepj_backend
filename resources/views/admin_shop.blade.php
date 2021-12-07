<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <title>shop_all</title>
</head>

<body>
  <div class="find_myshop">
    <form action="/admin_myshop/{id}" method="post">
      @csrf
      <input type="number" min="1" class="shop_number_input" placeholder="店番号で検索" name="shop_number">
      <button class="search_btn">検索</button>
    </form>
  </div>
</body>