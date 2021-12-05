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

  <div class="shop">
    <a href="/" class="home">
      << 店舗一覧へ</a>
  </div>

  <div class="wrapper">
    <div class="reserve_contents">
      <h2>予約状況</h2>
      @if(!isset($reserves[0]))
      <div class="no_contents_card">
        現在予約はありません。
      </div>
      @else
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
            <td>{{$reserve->num_of_users}}名</td>
          </tr>
        </table>
        <div class="delete_reserve">
          <a href=" {{ route('delete_reserve', ['id' => $reserve->id]) }}" onclick="alertcancel()" class="delete_btn">予約取り消し</a>
          <script>
            function alertcancel() {
              alert('予約取り消ししますか？');
            }
          </script>
        </div>
      </div>
      @endforeach
      @endif
    </div>

    <div class="favorite_shops">
      <h2>お気に入り店舗</h2>
      @if(!isset($favorites[0]))
      <div class="no_contents_card">
        お気に入り登録されている店舗はありません。
      </div>
      @else
      @foreach($favorites as $favorite)
      <div class="favorite_card">
        <div class="content-img">
          <img src={{$favorite->shop_img}} />
        </div>
        <div class="text-box">
          <h4 class="shop_name">{{$favorite->shop_name}}</h4>
          <span class="area_name">#{{$favorite->area_name}}</span>
          <sspan class="genre_name">#{{$favorite->genre_name}}</sspan>
        </div>
        <div class="detail">
          <div class="detail_btn">
            <a href="/detail/:{{$favorite->shop_id}}">詳しく見る</a>
          </div>
          <div class="likes">
            <a href="{{ route('mypagenoFavorite', ['id' => $favorite->id]) }}" class="btn btn-success btn-sm heart pink"></a>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
  @endauth
</body>

<style scoped>
  body {
    padding: 0 3%;
  }

  h1 {
    font-size: 1.5em;
    font-weight: bold;
  }

  h2 {
    display: block;
    width: 100%;
    font-size: 1.5em;
    font-weight: bold;
    margin-bottom: 50px;
  }

  h3 {
    font-weight: bold;
    display: block;
    text-align: center;
    margin-top: 2%;
    margin-bottom: 4%;
    font-size: 0.8em;
  }

  h4 {
    font-weight: bold;
    font-size: 1.2em;
  }

  .delete_reserve {
    margin: 3% 0;
    text-align: center;
    font-size: 0.8em;
  }
  .delete_btn{
    background-color: white;
    color:rgb(59, 91, 244);
    padding:3% 2%;
    border-radius: 5%;
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
    display: flex;
    margin-top: 5%;
  }


  .reserve_contents {
    position: absolute;
    margin-left: 3%;
    width: 50%;
  }

  .no_contents_card {
    width: 60%;
    background-color: #888888;
    color: white;
    margin: 0% 10% 10% 0%;
    padding: 10% 5% 10% 5%;
  }

  .reserve_card {
    width: 60%;
    display: flexbox;
    background-color: rgb(59, 91, 244);
    color: white;
    margin: 0% 10% 10% 0%;
    padding: 2% 5% 2% 5%;
  }

  table {
    width: 100%;
    border-spacing: 1.5em;
  }

  td {
    padding-left: 10%;
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
    margin: 0 10px 10px 10px;
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

  .pink::after,
  .pink::before {
    background: #ff367f;
  }

  .home {
    margin: 10% 0 0 3%;
    background-color: rgb(59 91 244);
    padding: 1% 3%;
    color: white;
    font-weight: bold;
  }

  .shop {
    margin-top: 5%;
  }

  @media screen and (max-width: 768px) {
    body {
      padding: 2% 3%;
    }

    .wrapper {
      display: block;
    }

    .reserve_contents {
      display: block;
      width: 80%;
      position: relative;
    }

    .reserve_card {
      width: 100%;
    }

    .favorite_shops {
      width: 100%;
      left: 0%;
      padding-left:5%;
      align-items: flex-start;
      justify-content: left;
      flex-wrap: wrap;
    }

    .favorite_card {
      width: 40%;
      height: 30%;

    }

    h4 {
      font-size: 1em;
    }

    .text-box,
    .detail {
      padding-left: 4%;
    }

    .detail_btn {
      margin-bottom: 2%;
      margin-top: 2%;
    }

    .heart {
      margin-left: 35px;
    }
  }
</style>