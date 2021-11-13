<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="path/to/reset.css">
  <link rel="stylesheet" href="path/to/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MENU</title>

  <style scoped>
    .header {
      height: 50px;
      display: flex;
      background-color: #fff;
    }

    .menu-toggle {
      position: fixed;
      top: 10px;
      left: 10px;
      height: 34px;
      width: 44px;
      display: inline-block;
      box-sizing: border-box;
      background-color: blue;
      border: none;
      padding: 6px 10px;
      box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.25);
    }

    .menu-toggle div {
      position: absolute;
      left: 10px;
      height: 2px;
      background-color: #fff;
      border-radius: 1px;
      display: inline-block;
      box-sizing: border-box;
    }

    .menu-toggle div:nth-of-type(1) {
      top: 6px;
      width: 8px;
    }

    .menu-toggle div:nth-of-type(2) {
      top: 16px;
      width: 24px;
    }

    .menu-toggle div:nth-of-type(3) {
      bottom: 6px;
      width: 8px;
    }

    .rease {
      position: fixed;
      left: 64px;
      top: 5px;
      height: 34px;
      color: blue;
      font-size: 32px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="header">
    <div>
      <a class="menu-toggle" href="./menu1">
        <div></div>
        <div></div>
        <div></div>
      </a>
    </div>
    <div class="rease">
      Rease
    </div>
    </header>
  </div>
</body>