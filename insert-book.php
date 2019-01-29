<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops-新增書籍</title>
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

    <div class="container" style="margin-top:85px;" id="content">
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
          $sql = $pdo->prepare('INSERT INTO books VALUES(?, ?, ?, ?, ?, ?, ?)') ;
          if($sql->execute([$_REQUEST['ISBN'], $_REQUEST['name'], $_REQUEST['date'], (int)$_REQUEST['price'], $_REQUEST['class'], $_REQUEST['W_ID'], $_REQUEST['PH_ID']])) {
            echo '<div class="alert alert-success" role="alert">資料新增成功!</div>';
          } else {
            echo '<div class="alert alert-danger " role="alert">資料新增失敗!</div>';
          }
        }
      ?>

    <!-- 表單 -->
    <form action="" method="post" class="needs-validation" novalidate>
      <div class="form-group row">
        <label for="inputName" class="col-md-2 col-form-label">書名</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputName" name="name" placeholder="請輸入書名" required>
          <div class="invalid-feedback">
            請輸入書名
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputW_ID" class="col-md-2 col-form-label">作者</label>
        <div class="col-md-10">
          <select class="form-control" id="inputW_ID" name="W_ID">
            <?php
              foreach($pdo->query('select * from writers') as $row) {
                echo '<option value="'.$row['W_ID'].'">'.$row['W_NAME'].'</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPH_ID" class="col-md-2 col-form-label">出版社</label>
        <div class="col-md-10">
          <select class="form-control" id="inputPH_ID" name="PH_ID">
            <?php
              foreach($pdo->query('select * from publishing_house') as $row) {
                echo '<option value="'.$row['PH_ID'].'">'.$row['PH_NAME'].'</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPrice" class="col-md-2 col-form-label">價格</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputPrice" name="price" placeholder="請輸入價格" required>
          <div class="invalid-feedback">
            請輸入價格
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputISBN" class="col-md-2 col-form-label">ISBN</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputISBN" name="ISBN" placeholder="請輸入ISBN" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            請輸入ISBN
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputDate" class="col-md-2 col-form-label">出版日期</label>
        <div class="col-md-10">
          <input type="date" class="form-control" id="inputDate" name="date" placeholder="請輸入出版日期">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputClass" class="col-md-2 col-form-label">類別</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputClass" name="class" placeholder="請輸入類別">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-auto">
          <button type="submit" class="btn btn-dark mb-2" name="btn_submit" value="books">新增書籍</button>
        </div>
        <div class="col"></div>
      </div>
      <div class="form-group row justify-content-end form-inline">
        <label class="col-auto align-self-end text-muted" style="font-size:12px;">選項裡沒有需要的出版社或作者嗎?</label>
        <div class="col-auto">
          <div class="input-group">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-dark" onclick="location.href='insert-ph.php'">新增出版社</button>
            </div>
            <div class="input-group-append">
              <button type="button" class="btn btn-dark" onclick="location.href='insert-writers.php'">新增作者</button>
            </div>
          </div>
        </div>
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