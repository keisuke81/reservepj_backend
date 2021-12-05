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

  <div class="qrcode">
    {!! QrCode::generate(
    '{{$param}}'

    ) !!}
  </div>

  <a href="/mypage">Mypageへ</a>

</body>

<style scoped>
  .qrcode {
    margin: 5% 3%;
    margin-top: 55px;
  }

  a {
    margin:0 3%;
    color: black;
    border-bottom: solid 1px black;
  }
</style>