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
  @component('components.header')
  @endcomponent

  <div class="title">検索結果</div>

  <div>
    <form action="/find_shop" method="post">
      @csrf
      <input type="text" class="search_input" placeholder="店名で検索" name="search_shop_name" id="search_shop_name">
      <button class="search_btn">検索</button>
    </form>
  </div>
  <div class="search_area">
    <div class="area">▼エリア別検索</div>
    <a href="/find_area/1" class="search_area_btn">東京</a>
    <a href="/find_area/2" class="search_area_btn">大阪</a>
    <a href="/find_area/3" class="search_area_btn">福岡</a>
  </div>

  <div class="search_genre">
    <div class="genre">▼ジャンル別検索</div>
    <a href="/find_genre/1" class="search_genre_btn">寿司</a>
    <a href="/find_genre/2" class="search_genre_btn">焼き肉</a>

    <a href="/find_genre/3" class="search_genre_btn">居酒屋</a>

    <a href="/find_genre/4" class="search_genre_btn">イタリアン</a>

    <a href="/find_genre/5" class="search_genre_btn">ラーメン</a>
  </div>

  <div class="back">
    <a href="/" class="back_btn">
      店舗一覧へ </a>
  </div>

  <div class="wrapper">
    @foreach($items as $item)
    <div class="card">
      <div class="content-img">
        <img src={{$item->img_url}} />
      </div>
      <div class="text-box">
        <h1 class="shop_name">{{$item->name}}</h1>
        <span class="area_name">#{{$item->area_name}}</span>
        <span class="genre_name">#{{$item->genre_name}}</span>
      </div>
      <div class="detail">
        <div class="detail_btn">
          <a href="/detail/:{{$item->id}}">詳しく見る</a>
        </div>
        <div class="likes">
          @if($item->is_liked_by_auth_user())
          <a href="{{ route('noFavorite', ['id' => $item->id]) }}" class="btn btn-success btn-sm heart pink"></a>
          @else
          <a href="{{ route('getFavorite', ['id' => $item->id]) }}" class="btn btn-secondary btn-sm heart gray"></a>
          @endif
        </div>
      </div>
    </div>
    @endforeach

  </div>
</body>

<script>
  var app = new Vue({
    el: '#app',
    data: {
      buttonState: false
    },
    methods: {
      changeState: function() {
        this.buttonState = !this.buttonState
      }
    }
  })
</script>

<style scoped>
  .search_area,
  .search_genre {
    margin: 0% 2%;
  }

  .area,
  .genre {
    margin: 2% 0;
  }

  .search_area_btn,
  .search_genre_btn {
    margin-top: 1%;
    border: solid 2px black;
    color: black;
    font-weight: bold;
    padding: 1% 2%;
    font-size: 1.2em;
  }

  .back {
    margin: 2% 0;
  }

  .back_btn {
    margin-left: 2%;
    color: rgb(59 91 244);
    font-weight: bold;
    font-size: 1.2em;
    border-bottom: solid 2px rgb(59 91 244);
  }

  body {
    margin-top: 50px;
  }

  .search_input {
    margin: 2% 2%;
    border: solid 3px rgb(59 91 244);
    border-radius: 5px;
  }

  .search_btn {
    padding: 5px 10px;
    border-radius: 5px;
    background-color: rgb(59 91 244);
    color: white;
  }

  h1 {
    font-size: 1.5em;
    font-weight: bold;
  }

  .shop_name {
    margin-top: 10px;
  }

  .area_name,
  .genre_name {
    font-size: 0.8em;
  }

  .wrapper {
    margin-top: 2%;
    display: flex;
    align-items: flex-start;
    justify-content: left;
    flex-wrap: wrap;
  }

  .title {
    margin: 2% 3%;
    font-size: 2em;
    font-weight: bold;
  }

  .card {
    border: solid 1px black;
    margin: 10px 10px;
    height: 300px;
    width: 250px;

  }

  img {
    width: 100%;
  }

  .text-box,
  .detail {
    padding: 0 20px;
  }

  h1 {
    margin-top: 5px;
    margin-bottom: 10px;
  }

  .detail {
    display: flex;
  }

  .detail_btn {
    margin-top: 20px;
    padding: 5px 10px;
    border-radius: 5px;
    background-color: rgb(59 91 244);
    color: white;
  }

  .likes {
    position: relative;
  }

  .heart {
    padding-top: 0;
    background-color: transparent;
    border: transparent;
    margin-top: 0;
    margin-left: 50px;
    width: 40px;
    height: 40px;
    position: absolute;
    top: 0px;
    bottom: 0px;

  }

  .heart::before,
  .heart::after {
    content: "";
    width: 50%;
    height: 80%;
    border-radius: 25px 25px 0 0;
    display: block;
    position: absolute;
    background: #bbbbbb;
  }

  .heart::before {
    transform: rotate(-45deg);
    left: 14%;
  }

  .heart::after {
    transform: rotate(45deg);
    right: 14%;
  }

  .pink::after,
  .pink::before {
    background: #ff367f;
  }

  .hello {
    margin: 2% 3%;
  }

  @media screen and (max-width: 768px) {
    .wrapper {
      display: block;
    }

    .card {
      width: 80%;
      height: 100%;
      padding: 0% 0 2% 0;
    }

    .likes {
      text-align: right;
    }

    .text-box {
      display: flex;
    }

    .shop_name {
      font-size: 2em;
      margin: 2% 0;
    }

    .area_name {
      font-size: 1.5em;
      margin: auto 0 auto 20%;
    }

    .genre_name {
      font-size: 1.5em;
      margin: auto 0 auto 5%;
    }

    .detail_btn {
      font-size: 1.5em;
    }

    .heart {
      position: absolute;
      margin-top: 20px;
    }
  }
</style>