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
    @foreach($reserves as $reserve)
    <div class="reserve_card">
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

    <div class="favorite_shops">
      @foreach($shops as $shop)
      <div class="favorite_card">
        <div class="content-img">
          <img src={{$shop->img_url}} />
        </div>
        <div class="text-box">
          <h1 class="shop_name">{{$shop->name}}</h1>
          <span class="area_name">#{{$shop->area_name}}</span>
          <sspan class="genre_name">#{{$shop->genre_name}}</sspan>
        </div>
        <div class="detail">
          <div class="detail_btn">
            <a href="/detail/:{{$shop->id}}">詳しく見る</a>
          </div>
          <form action="/" method="post">
            @csrf
            <div class="likes">
              <button class="heart">
              </button>
            </div>
            <input type="hidden" name="id" value="{{$item->id}}">
          </form>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endauth
</body>