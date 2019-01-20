<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
      .Chinesefont {
        font-family: sans-serif,Microsoft JhengHei;
      }
    </style>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body class="Chinesefont">
    <!-- navbar -->
    <script type="text/javascript" src="navbar.js"></script>
    <!-- main -->
    <div class="container" style="margin-top:55px;" id="content">
      <!-- 連接資料庫 -->
      <?php
        try {
          $pdo=new PDO("mysql:host=localhost;dbname=bookshops;charset=utf8","root","");
        } catch (PDOException $err) {
          die("資料庫無法連接");
        }
      ?>
      
      <!-- 搜索列 -->
      <form action="" method="post">

        <div class="input-group mb-4">
          <input type="text" name="keyword" class="form-control border-dark" placeholder="請輸入搜尋關鍵字..." aria-label="searchText" aria-describedby="basic-addon2" style="outline:none;box-shadow:none;">
          <div class="input-group-append">
              <button class="btn btn-outline-dark" type="submit">　搜尋　</button>
          </div>
        </div>
      </form>
      
      <!-- 搜尋結果 -->
      <div class="row">
        <?php
          $sql = 'SELECT books.B_NAME, books.B_PRICE, writers.W_NAME FROM books, writers WHERE books.W_ID = writers.W_ID';
          if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_REQUEST['keyword'])) {
            $sql = $sql." AND books.B_NAME LIKE '%".$_REQUEST['keyword']."%'";
          }
          
          foreach($pdo->query($sql) as $row) {
            echo '    <div class="col">';
            echo '      <div class="card mb-4" style="width: 15rem;">';
            echo '        <ul class="list-group list-group-flush">';
            echo '          <li class="list-group-item">'.htmlspecialchars($row['B_NAME' ]).'</li>';
            echo '          <li class="list-group-item">'.htmlspecialchars($row['B_PRICE']).'</li>';
            echo '          <li class="list-group-item">'.htmlspecialchars($row['W_NAME' ]).'</li>';
            echo '        </ul>';
            echo '      </div>';
            echo '    </div>';
          }
        ?>
      </div>
    </div>


<!-- jQuery’s slim build -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
</body>
</html>