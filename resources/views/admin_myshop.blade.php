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
        @if(!isset($reserves[0]))
        <div class="no_contents_card">
          現在予約はありません。
        </div>
        @endif
        @foreach($reserves as $reserve)
        <tr>
          <td>{{$reserve->date}}</td>
          <td>{{$reserve->time}}</td>
          <td>{{$reserve->user_name}}</td>
          <td>{{$reserve->num_of_users}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  <form action="/edit_done" method="post">  
    @csrf
    <div class="info">
      <h1>現在の店舗情報</h1>

      <input type="hidden" name="id" value="{{$item->id}}">
      <div class="info_item">
        店舗名：<input value="{{$item->name}}" name="name">
      </div>
      <div class="info_item">
        エリア：{{$item->area_name}}
    </div>
      <div class="info_item">
        ジャンル：{{$item->genre_name}}
      </div>
      <div class="info_item">
        説明：<br><textarea class="desc" rows="10" cols="40" name="description">{{$item->description}}</textarea>
      </div>
    </div>
   <button>更新する</button> 
  </form>  
</body>

<style scoped>
  button{
    background-color: black;
    color:white;
    border-radius: 5px;
    padding:1% 1.5%;
  }
  input,textarea {
    border:solid 1px black;
  }

  body {
    padding: 2% 2%;
  }

  h1 {
    font-size: 1.5em;
    font-weight: bold;
  }

  .no_contents_card {
    background-color: #888888;
    padding: 5% 5%;
    width: 50%;
  }

  .reserve,
  .info {
    margin: 3% 0;
  }

  table {
    width: 70%;
  }

  tr {
    width: 1.5em;
    height: 1.5em;
  }

  th,
  td {
    margin-right: 1%;
    margin-top: 1%;
  }

  .info_item {
    margin-top: 2%;
  }
</style>