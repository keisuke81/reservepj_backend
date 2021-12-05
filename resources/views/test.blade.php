<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>shop_detail</title>
  <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
  <script>
    function alertReserve() {
      alert('予約しますか？');
    }
  </script>
</head>

<body>
  @component('components.header')
  @endcomponent
</body>

<style scoped>
  body{
    background-color: gray;
  }
</style>