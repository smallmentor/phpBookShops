<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops-新增出版社</title>
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
    ?>
    
    <div class="container" style="margin-top:85px;" id="content">
      <!-- 新增資料 -->
      <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
          $sql = $pdo->prepare('INSERT INTO publishing_house VALUES(?, ?, ?, ?)') ;
          if($sql->execute([$_REQUEST['ID'], $_REQUEST['name'], $_REQUEST['phone'], (int)$_REQUEST['address']])) {
            echo '<div class="alert alert-success" role="alert">資料新增成功!</div>';
          } else {
            echo '<div class="alert alert-danger " role="alert">資料新增失敗!</div>';
          }
        }
      ?>

    <!-- 表單 -->
    <form action="" method="post" class="needs-validation" novalidate>
      <div class="form-group row">
        <label for="inputID" class="col-md-2 col-form-label">出版社編號</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputID" name="ID" placeholder="請輸入出版社編號" required>
          <div class="invalid-feedback">
            請輸入出版社編號
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputName" class="col-md-2 col-form-label">出版社名稱</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputName" name="name" placeholder="請輸入出版社名稱" required>
          <div class="invalid-feedback">
            請輸入出版社名稱
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPhone" class="col-md-2 col-form-label">聯絡電話</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="請輸入聯絡電話" aria-describedby="inputGroupPrepend">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputAddress" class="col-md-2 col-form-label">地址</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputAddress" name="address" placeholder="請輸入地址" aria-describedby="inputGroupPrepend">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto">
          <button type="submit" class="btn btn-dark mb-2" name="btn_submit" value="books">新增出版社</button>
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


    <!-- jQuery’s slim build -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
</body>
</html>