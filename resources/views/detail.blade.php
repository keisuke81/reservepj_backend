<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>shop_detail</title>
</head>

<body>
  @component('components.header')
  @endcomponent


  <div class="detail_content">
    <div class='shop_name'>
      <a href="/" class="back_btn"></a>
      <h1>{{$item->name}}</h1>
    </div>
    <div class="content-img">
      <img src={{$item->img_url}} />
    </div>
    <div class="text-box">
      <h1 class="shop_name">{{$item->name}}</h1>
      <span class="area_name">#{{$item->area_name}}</span>
      <sspan class="genre_name">#{{$item->genre_name}}</sspan>
      <p>{{$item->description}}</p>
    </div>
  </div>
</body>

<style scoped>
  .back_btn {
    margin-top: 30px;
    position: relative;
    display: inline-block;
    padding: 0 0 0 16px;
    color: #000;
    vertical-align: middle;
    text-decoration: none;
    font-size: 30px;
  }

  .back_btn::before,
  .back_btn::after {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    content: "";
    vertical-align: middle;
  }

  .back_btn::before {
    box-sizing: border-box;
    width: 30px;
    height: 30px;
    border: none;
    border-radius: 1px;
    box-shadow: 2px 2px 4px;
  }

  .back_btn::after {
    left: 12px;
    width: 10px;
    height: 10px;
    border-top: 1px solid #000;
    border-right: 1px solid #000;
    -webkit-transform: rotate(225deg);
    transform: rotate(225deg);
  }
</style>