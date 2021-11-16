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
    margin-top: 100px;
    display: flex;
    align-items: flex-start;
    justify-content: left;
    flex-wrap: wrap;
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
    background-color: blue;
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
</style>