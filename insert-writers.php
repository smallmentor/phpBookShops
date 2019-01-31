<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops-新增作者</title>
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

      <!-- 新增資料 -->
      <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
          $sql = $pdo->prepare('INSERT INTO writers VALUES(?, ?)') ;
          if($sql->execute([$_REQUEST['ID'], $_REQUEST['name']])) {
            echo '<div class="alert alert-success" role="alert">資料新增成功!</div>';
          } else {
            echo '<div class="alert alert-danger " role="alert">資料新增失敗!</div>';
          }
        }
      ?>

      <!-- 表單 -->
      <form action="" method="post" class="needs-validation" novalidate>
        <div class="form-group row">
          <label for="inputID" class="col-md-2 col-form-label">作者編號</label>
          <div class="col-md-10">
            <input type="text" class="form-control" id="inputID" name="ID" placeholder="請輸入作者編號" required>
            <div class="invalid-feedback">
              請輸入作者編號
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputName" class="col-md-2 col-form-label">作者姓名</label>
          <div class="col-md-10">
            <input type="text" class="form-control" id="inputName" name="name" placeholder="請輸入作者姓名" required>
            <div class="invalid-feedback">
              請輸入作者姓名
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-auto">
            <button type="submit" class="btn btn-dark mb-2" name="btn_submit" value="books">新增作者</button>
          </div>
          <div class="col"></div>
        </div>
      </form>

      <!-- 驗證輸入 -->
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
      </script>
    </div>


    <!-- Footer -->
    <script type="text/javascript" src="footer.js"></script>
</body>
</html>