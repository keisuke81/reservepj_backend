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

  <h1>▼QRコード</h1>

  <div class="qrcode">
    {!! QrCode::generate(
    '{{$param}}'

    ) !!}
  </div>
  <h1>▼WEB決済</h1>
  <form action="{{route('stripe.charge')}}" method="POST" class="payment">
    @csrf
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}" data-amount="1000" data-name="お支払い画面" data-label="お支払い" data-description="現在はデモ画面です" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
    </script>
  </form>


  <a href="/mypage">Mypageへ</a>


</body>

<style scoped>

  body{
    margin-top: 55px;
  }
  h1{
    margin:1% 2%;
    font-weight: bold;
  }
  .qrcode {
    margin: 2% 3%;
    margin-bottom: 5%;
  }

  a {
    margin: 5% 3%;
    color: black;
    border-bottom: solid 1px black;
  }

  .payment {
    margin: 2% 2%;
  }
</style>