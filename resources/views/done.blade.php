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
    <a href="/mypage">戻る</a>
  </div>

</body>
<style scoped>
  body{
    padding:2% 5%;
    height:700px;
  }
  .done_card {
    margin-top: 10%;
    height: 40%;
    width: 70%;
    padding:10% 10%;
    background-color: #E6E9E9;
    text-align: center;
  }

  p {
    font-size: 20px;
    align-items: center;
    margin-top: 0%;
    margin-bottom: 5%;
  }

  a {
    position: relative;
    top: 50%;
    padding: 20px 30px;
    border-radius: 3px;
    background-color: blue;
    color: white;
  }

  @media screen and (max-width: 768px) {
    body{
      padding:3% 2%;
      height:700px;
    }
    .done_card{
      width:80%;
      height: 40%;
      margin: 5% auto;
    }
  }
</style>