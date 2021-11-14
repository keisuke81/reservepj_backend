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
  <div class="done_card">
    <p>ご予約ありがとうございます。</p>
    <a href="/">戻る</a>
  </div>

</body>
<style scoped>
  .done_card {
    position: relative;
    margin-top: 10%;
    left: 30%;
    height: 300px;
    width: 500px;
    background-color: #E6E9E9;
    text-align: center;
  }
  p{
    position:relative;
    top:30%;
    font-size: 20px;
    align-items: center;
    margin-top:50px;
    margin-bottom:40px;
  }
  a{
    position:relative;
    top:50%;
    padding:20px 30px;
    border-radius: 3px;
    background-color: blue;
    color:white;
  }
</style>