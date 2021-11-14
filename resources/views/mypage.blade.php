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

  <h1>{{User.name}}さん</h1>

  <div class="wrapper">
    @foreach($reserves as $reserve)
    <div class="reserve_card">
      <table>
        <tr>
          <th>Shop</th>
          <td></td>
        </tr>
      </table>
    </div>
  </div>
</body>