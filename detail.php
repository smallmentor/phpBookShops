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
    </div>
    
    <!-- Footer -->
    <script type="text/javascript" src="footer.js"></script>
</body>
</html>