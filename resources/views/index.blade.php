<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <sspan class="genre_name">#{{$item->genre_name}}</sspan>
      </div>
      <div class="detail">
        <div class="detail_btn">
          <a href="/detail/:{{$item->id}}">詳しく見る</a>
        </div>
        <div class="like_btn">

        </div>
      </div>
    </div>
    @endforeach
  </div>
</body>

<style scoped>
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
</style>