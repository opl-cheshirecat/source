<?php

  session_start();

  if(!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit;
  }
?>

<?php include('../header.html'); ?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand text-muted">顧客管理システム</a>
    <ul class="nav navbar-nav navbar-right" id="nav">
      <li><a href="../registInput.php">顧客情報登録</a></li>
      <li class="active"><a href="../searchInput.php">顧客情報検索</a></li>
      <li><a href="mailSend.php">メール送信</a></li>
      <li><a href="userRegist.php">ユーザ登録</a></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>顧客情報詳細</h2></div>
  </div>

  <?php
  /* 顧客ID取得 */
  $crientId = $_REQUEST['crientId'];

  /* データベース接続 */
  require "dbConnector.php";
  $mysqli = dbConnect();
  $mysqli->set_charset("utf8");
  /* SQL */
  $sql = 'SELECT * FROM crient WHERE CrientId = ?';

  /* プリペアドステートメント */
  if ($stmt = $mysqli->prepare($sql)) {
    /* 変数のバインド */
    $stmt->bind_param('i', $crientId);

    /* プリペアドステートメント実行 */
    if ($stmt->execute()) {
      /* 結果の取得 */
      $result = $stmt->get_result();
      $cnt = $result->num_rows;

      /* 結果出力 */
      if ($cnt == 0) {
        print('該当するデータがありません。<br>');
      } else {
        /* 入力フォーム */
        $row = $result->fetch_array(MYSQLI_ASSOC);
        print('<form action="update.php" method="post">');
        print('<input type="hidden" name="crientId" value="' . $row['CrientId'] . '"">');
        print('<div class="form-group">');
          print('<label>企業名</label>');
          print('<input type="text" name="companyName" value="' . $row['CompanyName'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>企業ランク</label>');
          print('<select name="companyRank" id="companyRank" value="' . $row['CompanyRank'] . '" class="form-control">');
            print('<option value="A">A</option>');
            print('<option value="B">B</option>');
            print('<option value="C">C</option>');
          print('</select>');
        print('</div>');
        print('<div class="form-group">');
          print('<label>担当者名</label>');
          print('<input type="text" name="contactName" value="' . $row['ContactName'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>キャラ</label>');
          print('<input type="text" name="contactCharacter" value="' . $row['ContactCharacter'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>担当者電話番号</label>');
          print('<input type="text" name="contactTel" value="' . $row['ContactTel'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>担当者メールアドレス</label>');
          print('<input type="text" name="contactMail" value="' . $row['ContactMail'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>送信用メールアドレス</label>');
          print('<input type="text" name="sendMail" value="' . $row['SendMail'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>ホームページ</label>');
          print('<input type="text" name="webPage" value="' . $row['WebPage'] . '" class="form-control">');
        print('</div>');
        print('<div class="form-group">');
          print('<label>案件情報</label>');
          print('<textarea name="caseInfo" cols=50 rows=5 class="form-control">' . $row['CaseInfo'] . '</textarea>');
        print('</div>');
        print('<button type="submit" class="btn">更新</button>');
        print('</form>');
      }
    }
  }

  ?>
</div>

<?php include('../footer.html'); ?>
