<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <!-- CSS -->
    <link href="css/bookshops-style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="Chinesefont">

    <!-- Navbar -->
    <script type="text/javascript" src="navbar.js"></script>

    <!-- Content -->
    <div class="container content" id="content">
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
      <form action="update.php" method="post">
      <div class="row justify-content-between">
        <?php
          $sql = 'SELECT books.ISBN, books.B_NAME, books.B_PRICE, writers.W_NAME FROM books, writers WHERE books.W_ID = writers.W_ID';
          if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_REQUEST['keyword'])) {
            $sql = $sql." AND books.B_NAME LIKE '%".$_REQUEST['keyword']."%'";
          }
          
          foreach($pdo->query($sql) as $row) {
            echo '    <div class="col-auto">';
            echo '      <div class="card mb-4 border-dark bg-light" style="width: 15rem;">';
            echo '        <ul class="list-group list-group-flush">';
            echo '          <li class="list-group-item">'.htmlspecialchars($row['B_NAME' ]).'</li>';
            echo '          <li class="list-group-item">價格：'.htmlspecialchars($row['B_PRICE']).'</li>';
            echo '          <li class="list-group-item">作者：'.htmlspecialchars($row['W_NAME' ]).'</li>';
            echo '          <li class="list-group-item"><div class="row justify-content-around">';
            echo '          <button class="btn btn-dark col-auto" type="submit" name="ISBN" value="'.htmlspecialchars($row["ISBN"]).'">修改資料</button>';
            echo "          <button type='button' class='btn btn-dark col-auto' onclick='location.href=\"detail.php?ISBN=".htmlspecialchars($row['ISBN' ])."\"'>詳細資料</button></div></li>";
            echo '        </ul>';
            echo '      </div>';
            echo '    </div>';
          }
        ?>
      </div>
      </form>    
    </div>
    
    <!-- Footer -->
    <script type="text/javascript" src="footer.js"></script>
</body>
</html>