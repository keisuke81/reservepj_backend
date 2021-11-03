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


  <div class="detail_content">
    <div class='shop_name'>
      <a href="/" class="back_btn"></a>
      <h1>{{$item->name}}</h1>
    </div>
    <div class="content-img">
      <img src={{$item->img_url}} />
    </div>
    <div class="text-box">
      <span class="area_name">#{{$item->area_name}}</span>
      <sspan class="genre_name">#{{$item->genre_name}}</sspan>
      <p class="description">{{$item->description}}</p>
    </div>
  </div>

  <div class="reserve_form">
    <form action="/done" method="post">
      <h2>予約</h2>
      <div>
        <input type="date" id="date" class="reserve_date" value="2021-04-01">
      </div>
      <div>
        <input type="time" id="time" class="reservee_time" value="17:00">
      </div>
      <div>
        <select id="number">
          <option value="1人">１人</option>
          <option value="2人">２人</option>
          <option value="3人">３人</option>
          <option value="4人">４人</option>
          <option value="5人">５人</option>
          <option value="6人">６人</option>
          <option value="7人">７人</option>
          <option value="8人">８人</option>
          <option value="9人">９人</option>
          <option value="10人">１０人</option>
          <option value="11人">１１人</option>
          <option value="12人">１２人</option>
          <option value="13人">１３人</option>
          <option value="14人">１４人</option>
          <option value="15人">１５人</option>
        </select>
      </div>
      <div class="reserve_content">
        <table>
          <tr>
            <th>Shop</th>
            <td>{{$item->name}}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>
              <p id="output_date"></p>
            </td>
          </tr>
          <tr>
            <th>Time</th>
            <td>
              <p id="output_time"></p>
            </td>
          </tr>
          <tr>
            <th>Number</th>
            <td>
              <p id="output_number"></p>
            </td>
          </tr>
        </table>
      </div>
      <button class="reserve_btn">予約する</button>
    </form>
  </div>
</body>

<style scoped>
  .back_btn {
    margin-top: 0px;
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

  .detail_content {
    margin-left: 16px;
    width: 40%;
    height: 60%;
  }

  img {
    width: 100%;
  }

  .shop_name {
    display: flex;
    position: relative;
    height: 50px;
  }

  h1 {
    font-size: 1.5em;
    font-weight: bold;
    position: absolute;
    top: 20%;
    left: 50px;

  }

  .text-box {
    margin-top: 30px;
  }

  .description {
    margin-top: 30px;
  }

  .reserve_form {
    position: absolute;
    left: 50%;
    top: 0%;
    margin-top: 30px;
    background-color: #2C7CFF;
    height: 60%;
    width: 40%;
    color: white;
  }

  h2 {
    font-size: 1.5em;
    font-weight: bold;
    margin: 40px 20px 5px 20px;
  }

  input,
  select {
    width: 80%;
    background-color: white;
    margin: 15px 20px;
    color: black;
    padding: 5px 3px;
    border-radius: 3px;
  }

  .reserve_content {
    background-color: #8EB8FF;
    width: 80%;
    border-radius: 5px;
    margin: 5px 0 0 20px;
    padding: 10px 10px;
  }

  tr {
    height: 30px;
  }

  td {
    padding-left: 30px;
  }

  .reserve_btn {
    width: 100%;
    background-color: blue;
    text-align: center;
    position: absolute;
    bottom: 0%;
    height: 40px;
    font-size: 0.8em;
  }
</style>

<script>
  let date = document.getElementById('date');
  let output_date = document.getElementById('output_date');
  let time = document.getElementById('time');
  let output_time = document.getElementById('output_time');
  let number = document.getElementById('number');
  let output_number = document.getElementById('output_number');

  timestamp = 0;

  function update() {

    timestamp++;
    window.requestAnimationFrame(update);

    if (timestamp % 10 == 0) {
      output_date.innerHTML = date.value;
      output_time.innerHTML = time.value;
      output_number.innerHTML = number.value;
    }

  }

  update();
</script>