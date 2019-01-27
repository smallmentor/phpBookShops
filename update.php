<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookShops-新增</title>
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

    <div class="container" style="margin-top:55px;" id="content">
    <!-- 更新&刪除資料 -->
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["btn_submit"])) {
          switch($_POST["btn_submit"]) {
            case "update":
              $sql = $pdo->prepare('UPDATE books SET B_NAME = ?, B_DATE = ?, B_PRICE = ?, B_CLASS = ?, W_ID = ?, PH_ID = ? WHERE ISBN = ?');
              if($sql->execute([$_REQUEST["name"], $_REQUEST["date"], $_REQUEST["price"], $_REQUEST["class"], $_REQUEST["W_ID"], $_REQUEST["PH_ID"], $_REQUEST["ISBN"]])) {
                echo '<div class="alert alert-success" role="alert">資料更新成功!</div>';
              } else {
                echo '<div class="alert alert-danger " role="alert">資料更新失敗!</div>';
              }
              break;
            case "delete":
              $status = "delete";
              $sql = $pdo->prepare('DELETE FROM books WHERE ISBN = ?');
              if($sql->execute([$_REQUEST["ISBN"]])) {
                echo '<div class="alert alert-success" role="alert">資料刪除成功!</div>';
              } else {
                echo '<div class="alert alert-danger " role="alert">資料刪除失敗!</div>';
              }
              break;
          }
        }

        if ($_SERVER["REQUEST_METHOD"]=="POST") {
          $ISBN   = "";
          $name   = "";
          $date   = "";
          $price  = "";
          $class  = "";
          $W_ID   = "";
          $PH_ID  = "";
          foreach($pdo->query('SELECT * FROM books WHERE ISBN = '.$_POST["ISBN"]) as $row) {
            $ISBN   = $row["ISBN"];
            $name   = $row["B_NAME"];
            $date   = $row["B_DATE"];
            $price  = $row["B_PRICE"];
            $class  = $row["B_CLASS"];
            $W_ID   = $row["W_ID"];
            $PH_ID  = $row["PH_ID"];
          }
        }
    ?>
    
    <!-- 表單 -->
    <form action="" method="post" class="needs-validation" novalidate>
      <input type="hidden" name="ISBN" value="<?php echo $ISBN ?>" />
      <div class="form-group row">
        <label for="inputName" class="col-md-2 col-form-label">書名</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputName" name="name" placeholder="請輸入書名" value="<?php echo $name ?>" required>
          <div class="invalid-feedback">
            請輸入書名
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputW_ID" class="col-md-2 col-form-label">作者</label>
        <div class="col-md-10">
          <select class="form-control" id="inputW_ID" name="W_ID" value="<?php echo $writer ?>">
            <?php
              foreach($pdo->query('select * from writers') as $row) {
                if($row['W_ID'] == $W_ID)
                  echo '<option value="'.$row['W_ID'].'" selected="true">'.$row['W_NAME'].'</option>';
                else
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
                if($row['PH_ID'] == $PH_ID)
                  echo '<option value="'.$row['PH_ID'].'" selected="true">'.$row['PH_NAME'].'</option>';
                else
                  echo '<option value="'.$row['PH_ID'].'">'.$row['PH_NAME'].'</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPrice" class="col-md-2 col-form-label">價格</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputPrice" name="price" placeholder="請輸入價格" value="<?php echo $price ?>" required>
          <div class="invalid-feedback">
            請輸入價格
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputDate" class="col-md-2 col-form-label">出版日期</label>
        <div class="col-md-10">
          <input type="date" class="form-control" id="inputDate" name="date" placeholder="請輸入出版日期" value="<?php echo $date ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputClass" class="col-md-2 col-form-label">類別</label>
        <div class="col-md-10">
          <input type="text" class="form-control" id="inputClass" name="class" placeholder="請輸入類別" value="<?php echo $class ?>">
        </div>
      </div>
      <div class="form-group row justify-content-end form-inline">
        <div class="col-auto">
          <div class="input-group">
            <div class="input-group-prepend">
              <button type="submit" class="btn btn-dark" name="btn_submit" value="update">更新資料</button>
            </div>
            <div class="input-group-append">
              <button type="submit" class="btn btn-dark" name="btn_submit" value="delete">刪除資料</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    </div>


    <!-- jQuery’s slim build -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
</body>
</html>