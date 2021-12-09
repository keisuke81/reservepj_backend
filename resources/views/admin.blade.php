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

  <h1>店舗管理画面</h1>
    <form action="/admin_myshop/{id}" method="post">
      @csrf
      <input type="number" min="1" class="shop_number_input" placeholder="店番号で選択" name="shop_number">
      <button class="search_btn">選択</button>
    </form>
  </div>
</body>
<style scoped>
  body{
    padding: 2% 3%;
  }

  h1{
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 2%;
  }
  input{
    border: solid 1px black ;
    border-radius: 5px;
    padding:1% 2%;
  }
  button{
    background-color: blue;
    color: white;
    padding: 1% 2%;
    border-radius: 5px;
  }
</style>