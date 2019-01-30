<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>個人資料類別辨識</title>
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
    <?php 
        $list1 = "〔記者林嘉東／基隆報導〕林姓男子不滿哥哥欠錢不還，把本票強制執行狀、有哥哥<span class='bg-warning'>身分證</span>字號等個資的土地登記謄本全PO臉書討債，哥哥報警處理。基隆地院日前審結，依違反個人資料保護法判他3月徒刑，得易科9萬元罰金。<br />判決指出，35歲林姓男子與自己哥哥有債務糾紛，不滿他不出面處理，去年4月間以手機登入臉書後，將哥哥有記載<span class='bg-muted'><span class='bg-warning'>姓名</span></span>、出生年月日、<span class='bg-warning'>身分證</span>字號、住處的土地謄本、本票強制執行狀、家事起訴狀、假扣押狀、<span class='bg-warning'>健保卡</span>、<span class='bg-warning'>駕照</span>等個資，全PO在自己的臉書上。<br />林的哥哥發現自己的個資遭弟弟公布在臉書上，氣到報警處理。林被檢方依違反個人資料保護法起訴。<br />法院審理時，林解釋，他PO哥哥的個資時忘了遮蔽，不是故意要洩漏哥哥的個資，且他PO上去沒多久就趕快刪除。他會這麼做，只是希望哥哥趕快還錢。<br />法院認為，林明知土地登記謄本等文件上有哥哥的個人資料，仍PO出哥哥個資，使不特定人士只要瀏覽到林的臉書就可看到，依「非法利用個人資料罪」判他3月徒刑，得易科9萬元罰金。";
        $list2 = "〔記者王孟倫／台北報導〕金管會昨天公布最新裁罰，新光人壽在金融檢查共有7大缺失，其中新光壽將新光紡織股票多次買賣給新光醫院，卻未經「董事會重度決議」，違反「利害關係人交易」規定等，遭裁罰600萬元，並祭出16項糾正，這是保險業史上一次被裁罰最多項糾正。<br />金管會保險局副局長張玉煇表示，新光壽的7大缺失包括：利害關係人交易、採購作業、資金運用、金融資產評價程序、電話行銷缺失、收費作業缺失及其它缺失；其中，違反「利害關係人交易」情節最嚴重，被開罰180萬元及一項糾正。<br />金管會的金檢報告指出，2017年新光壽在新光紡織改選前，多次大量賣出新光紡織的股票給新光醫院，改選結束後又將股票買回。<br />賣新紡股票 疑規避保險法<br />保險局官員也直言，上述行為疑似規避保險法，根據規定，保險公司對產業僅能單純財務性投資，不得參與行使表決權。<br />不過，保險局指出，由於無法知悉股東會改選投票給誰，也就是無法判斷或證實新光壽是否透過利害關係人（新光醫院）間接參與新光紡織改選，因此，這部分以「未經過董事會重度決議」，也就是程序上有違反規定而開罰。<br />新光壽其餘缺失包括：公司採購內部規範有欠周延，以致有高比率採購案件採專案核定的例外方式辦理，且簽辦採購案件多處疏漏，未確實執行所訂內部控制規定；該公司經辦業務人員未依規落實審核<span class='bg-warning'>信用卡</span>授權資料正確性，系統未對同一<span class='bg-warning'>信用卡</span>卡號授權資料進行比對管控，而致發生「同<span class='bg-warning'>信用卡</span>卡號持卡人<span class='bg-warning'>姓名</span>不同」的情形等。";
        $list3 = "小學生愛作文徵稿令<br />徵稿對象：限國小三年級～六年級學生投稿<br />徵稿內容：題目自訂、內容不限，經學校老師指導過的文字作品，中年級（三、四年級）200～400字內、高年級（五、六年級）400～500字內。<br />投稿格式： 請將文字作品Email至writing@libertytimes.com.tw，僅接受Email電子檔投稿。另須註明該篇題目、作者的真實<span class='bg-warning'>姓名</span>、就讀國小的所在縣市、學校名、年級班級以及指導老師<span class='bg-warning'>姓名</span>，並同時附上作者的監護人真實<span class='bg-warning'>姓名</span>、連絡電話、<span class='bg-warning'>身分證</span>字號、電子信箱、戶籍地址（含詳細區里鄰）、銀行<span class='bg-warning'>帳號</span>（供致贈稿費用，戶名需與監護人相同，另請附註銀行名稱與分行）。投稿Email主旨請註明「小學生愛作文」。<br />其他事項：<br />1.投稿留用與否會以<span class='bg-warning'>電子郵件</span>通知。一經錄用將擇期刊出，且編輯有權刪修。確定刊登日另以<span class='bg-warning'>電子郵件</span>通知。<br />2.作品須未曾於其他刊物、媒體發表，且不得抄襲他人作品。若涉及抄襲、侵害著作權或其他法律情事，經查證屬實，將取消刊登資格，並由作者負相關法律責任";
        $list4 = "我找不到文章了所以：<br /><br /><span class='bg-warning'>姓名</span>、<span class='bg-warning'>相片</span>、<span class='bg-warning'>指紋</span>、<span class='bg-warning'>手機號碼</span><br /><span class='bg-warning'>帳戶</span>、<span class='bg-warning'>帳號</span><br /><span class='bg-warning'>身分證</span>、<span class='bg-warning'>健保卡</span>、<span class='bg-warning'>駕照</span>";

    ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="input-tab" data-toggle="tab" href="#input" role="tab" aria-controls="input" aria-selected="true">輸入文章</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="example-tab" data-toggle="tab" href="#example" role="tab" aria-controls="example" aria-selected="false">範例文章</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="example-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">類別清單</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="input" role="tabpanel" aria-labelledby="input-tab">
        <!-- 輸入表單 -->
        <form action="" method="post">
            <div class="form-group mt-3">
                <textarea class="form-control" name="textarea" rows="10"><?php if ($_SERVER["REQUEST_METHOD"]=="POST") echo $_POST['textarea'] ?></textarea>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-auto">
                    <button type="submit" class="btn btn-dark col-auto">確定</button>
                </div>
            </div>
        </form>
        <div class="mb-3">
        <!-- 判斷 -->
        <?php 
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
                $str = $_POST['textarea'];
                echo "本文章具有：<br />";
                foreach($pdo->query('SELECT * FROM pi_category') as $pic) {
                    foreach($pdo->query('SELECT * FROM pi_type') as $pit) {
                        $count = 0;
                        foreach($pdo->query('SELECT * FROM pi_type, pi_keyword WHERE pi_keyword.PIT_ID = pi_type.PIT_ID') as $keyword) {
                            if($pic['PIC_ID'] == $pit['PIC_ID'] && $pit['PIT_ID'] == $keyword['PIT_ID']) {
                                // 從 $keyword['PIK_Keyword'] 以字串 $str 分割成字串陣列 再計算個數 = $str + 1
                                // 參數 -1 為不回傳最後一組字串 則等於 count數 - 1 即等於 $str 個數
                                $count += count(explode($keyword['PIK_Keyword'], $str, -1));
                            }
                        }
                        if($count >= 3)
                            echo '　　'.$pic['PIC_Name'].' - '.$pit['PIT_Name'].'<br />';
                    }
                }            
                echo "之特徵<br />";
            }
                
        ?>
        </div>
    </div>
    <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
        <!-- 範例文章 -->
        <div class="row mt-3 mb-3">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-list-1" data-toggle="list" href="#list-1" role="tab" aria-controls="1">範例文章一</a>
                <a class="list-group-item list-group-item-action"        id="list-list-2" data-toggle="list" href="#list-2" role="tab" aria-controls="2">範例文章二</a>
                <a class="list-group-item list-group-item-action"        id="list-list-3" data-toggle="list" href="#list-3" role="tab" aria-controls="3">範例文章三</a>
                <a class="list-group-item list-group-item-action"        id="list-list-4" data-toggle="list" href="#list-4" role="tab" aria-controls="4">範例文章四</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-list-1"><?php echo $list1 ?></div>
                <div class="tab-pane fade"             id="list-2" role="tabpanel" aria-labelledby="list-list-2"><?php echo $list2 ?></div>
                <div class="tab-pane fade"             id="list-3" role="tabpanel" aria-labelledby="list-list-3"><?php echo $list3 ?></div>
                <div class="tab-pane fade"             id="list-4" role="tabpanel" aria-labelledby="list-list-4"><?php echo $list4 ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">代號</th>
                <th scope="col">分辨型態(type)</th>
                <th scope="col">關鍵字</th>
                <th scope="col">個資類別(category)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($pdo->query('SELECT * FROM pi_category, pi_type, pi_keyword WHERE pi_category.PIC_ID = pi_type.PIC_ID AND pi_type.PIT_ID = pi_keyword.PIT_ID;') as $row) {
                        echo '<tr>';
                        echo '<th scope="row">'.$row['PIT_ID'].'</th>';
                        echo '<td>'.$row['PIT_Name'].'</td>';
                        echo '<td>'.$row['PIK_Keyword'].'</td>';
                        echo '<td>'.$row['PIC_Name'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    </div>

<!-- jQuery's slim build -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
</body>
</html>