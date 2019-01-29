<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops-詳細資料</title>
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
    
    <!-- 連接資料庫 -->
    <?php
      try {
        $pdo=new PDO("mysql:host=localhost;dbname=bookshops;charset=utf8","root","");
      } catch (PDOException $err) {
        die("資料庫無法連接");
      }

      foreach($pdo->query('SELECT * FROM books, publishing_house, writers WHERE books.W_ID = writers.W_ID AND books.PH_ID = publishing_house.PH_ID AND ISBN = '.$_GET["ISBN"]) as $row) {
        $ISBN    = $row["ISBN"];
        $name    = $row["B_NAME"];
        $date    = $row["B_DATE"];
        $price   = $row["B_PRICE"];
        $class   = $row["B_CLASS"];
        $W_NAME  = $row["W_NAME"];
        $PH_NAME = $row["PH_NAME"];
      }
    ?>
    
    <div class="container" style="margin-top:85px;" id="content">
    <form>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">書名：</label>
            <label class="col-form-label"><?php echo $name ?></label>
        </div>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">作者：</label>
            <label class="col-form-label"><?php echo $W_NAME ?></label>
        </div>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">出版社：</label>
            <label class="col-form-label"><?php echo $PH_NAME ?></label>
        </div>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">價格：</label>
            <label class="col-form-label"><?php echo $price.' 元' ?></label>
        </div>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">出版日期：</label>
            <label class="col-form-label"><?php echo $date ?></label>
        </div>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">類別：</label>
            <label class="col-form-label"><?php echo $class ?></label>
        </div>
        <div class="form-group">
            <label class="col-form-label" style="width: 10rem;">ISBN：</label>
            <label class="col-form-label"><?php echo $ISBN ?></label>
        </div>
    </form>

    <!-- jQuery’s slim build -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
</body>
</html>