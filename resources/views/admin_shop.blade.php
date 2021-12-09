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
    <h1>新規店舗作成</h1>
    <form action="/create_done" method="post">
      @csrf
      <div>
        店舗名：<input type="text" name="name">
      </div>
      <div>
        エリア番号：<input type="number" name="area_id" min="1" >
      </div>
      <div>
        ジャンル番号：<input type="number" name="genre_id" min="1">
      </div>
      <div>
        紹介文：<input type="text" name="description" value="紹介文を入れる。">
      </div>
      <div>
        イメージ写真：<input type="text" value="https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg" name="img_url">
      </div>
      <div>
        <button class="create_btn">作成する</button>
      </div>
    </form>
  </div>
</body>

<style scoped>
  body {
    padding: 2% 3%;
  }

  h1 {
    font-size: 1.5em;
    font-weight: bold;
  }

  input {
    border: solid 1px black;
    border-radius: 5px;
    height: 1.5em;
  }

  button {
    background-color: black;
    color: white;
    padding: 1% 2%;
    border-radius: 5px;
  }

  div {
    margin-top: 3%;
  }
</style>