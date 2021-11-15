<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>shop_all</title>
</head>

<body>
  @component('components.header')
  @endcomponent

  @auth
  <h1>{{$user_name}}さん</h1>

  <div class="wrapper">
    <div class="reserve_contents">
      <h2>予約状況</h2>
      @foreach($reserves as $reserve)
      <div class="reserve_card">
        <h3>予約{{$loop->iteration}}</h3>
        <table>
          <tr>
            <th>Shop</th>
            <td>{{$reserve->shop_name}}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>{{$reserve->date}}</td>
          </tr>
          <tr>
            <th>Time</th>
            <td>{{$reserve->time}}</td>
          </tr>
          <tr>
            <th>Number</th>
            <td>{{$reserve->num_of_users}}</td>
          </tr>
        </table>
      </div>
      @endforeach
    </div>

    <div class="favorite_shops">
      <h2>お気に入り店舗</h2>
      @foreach($favorites as $favorite)
      <div class="favorite_card">
        <div class="content-img">
          <img src={{$favorite->shop_img}} />
        </div>
        <div class="text-box">
          <h2 class="shop_name">{{$favorite->shop_name}}</h2>
          <span class="area_name">#{{$favorite->area_name}}</span>
          <sspan class="genre_name">#{{$favorite->genre_name}}</sspan>
        </div>
        <div class="detail">
          <div class="detail_btn">
            <a href="/detail/:{{$favorite->id}}">詳しく見る</a>
          </div>
          <form action="/" method="post">
            @csrf
            <div class="likes">
              <button class="heart">
              </button>
            </div>
            <input type="hidden" name="id" value="{{$favorite->id}}">
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endauth
</body>

<style scoped>
  h1 {
    font-size: 1.5em;
    font-weight: bold;
  }

  h2 {
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
    position: relative;
    margin-top: 100px;
  }

  .reserve_contents {
    position: absolute;
    left: 0%;
    width:50%;
  }

  .reserve_card {
    width: 60%;
    display: flexbox;
    background-color: blue;
    color: white;
    margin:0% 10% 10% 10%;
    padding:10% 10%;
  }

  .favorite_shops {
    position: absolute;
    left: 50%;
    display: flex;
    align-items: flex-start;
    justify-content: left;
    flex-wrap: wrap;

  }

  .favorite_card {
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
    background: #eeeeee;
    border-radius: 25px 25px 0 0;
    display: block;
    position: absolute;
  }

  .heart::before {
    transform: rotate(-45deg);
    left: 14%;
  }

  .heart::after {
    transform: rotate(45deg);
    right: 14%;
  }

  .heart_getFavorite {
    background-color: pink;
  }

  .heart_noFavorite {
    background-color: #eeeeee;
  }
</style>