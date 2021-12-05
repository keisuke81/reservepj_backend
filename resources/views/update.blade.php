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
</head>

<body>
  @component('components.header')
  @endcomponent
  <div class="wrapper">
    <div class="reserve_card">
      <h3>現在のご予約</h3>
      <table>
        <tr>
          <th>Shop</th>
          <td>{{$param[0]}}</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{$param[2]}}
          </td>
        </tr>
        <tr>
          <th>Time</th>
          <td>{{$param[3]}}
          </td>
        </tr>
        <tr>
          <th>Number</th>
          <td>
            {{$param[4]}}名
        </tr>
      </table>
    </div>
    <div class="update_reserve">
      <form action="/update" method="post">
        @csrf
        <h3>変更内容</h3>
        <table>
          <input type="hidden" name="id" value="{{$param[5]}}">
          <tr>
            <th>Shop</th>
            <td>{{$param[0]}}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>
              <input type="date" id="update_date" name="update_date" class="update_date" value="{{$param[2]}}">
            </td>
          </tr>
          <tr>
            <th>Time</th>
            <td>
              <input type="time" id="update_time" name="update_time" class="update_time" value="{{$param[3]}}">
            </td>
          </tr>
          <tr>
            <th>Number</th>
            <td>
              <input type="number" id="update_num_of_users" name="update_num_of_users" value="{{$param[4]}}">名
          </tr>
        </table>
        <div class="btn">
           <button>予約を変更する</button>
        </div>   
      </form>
    </div>
  </div>
</body>

<style scoped>
  body {
    margin: 0 3%;
    margin-top: 55px;
  }


  .reserve_card,
  .update_reserve {
    width: 46%;
    display: flexbox;
    background-color: rgb(59, 91, 244);
    color: white;
    margin: 0% 10% 10% 0%;
    padding: 2% 5% 2% 5%;
  }

  .reserve_card {
    background-color: #888888;
  }

  table {
    width: 100%;
    border-spacing: 1.5em;
  }

  td {
    padding-left: 5%;
  }

  #update_num_of_users {
    width: 40%;
  }

  input {
    background-color: white;
    color: rgb(59, 91, 244);
    padding: 1% 2%;
    border-radius: 5px;
  }

  .btn{
    text-align: center;
  }

  button {
    background-color: #ffffcc;
    color: black;
    font-weight: bold;
    padding:1% 2%;
    border-radius: 5px;
  }
</style>