<!DOCTYPE html>
<html lang="ja">

<head>
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <title>shop_all</title>
</head>

<body>
  <div class="reserve">
    <h1>現在入っている予約</h1>

    <table>
      <tr>
        <th>日付</th>
        <th>時間</th>
        <th>名前</th>
        <th>人数</th>
      </tr>
      @foreach($reserves as $reserve)
      <tr>
        <td>{{$reserve->date}}</td>
        <td>{{$reserve->time}}</td>
        <td>{{$user_name}}</td>
        <td>{{$reserve->num_of_users}}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="info">
    
  </div>
</body>