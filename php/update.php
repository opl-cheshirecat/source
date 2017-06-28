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
    <div class="col-xs-5"><h2>顧客情報更新</h2></div>
  </div>


    <?php
    /* 入力値取得 */
    $crientId = $_REQUEST['crientId'];
    $companyName = $_REQUEST['companyName'];
    $lastApDate = $_REQUEST['lastApDate'];
    $contactName = $_REQUEST['contactName'];
    $contactCharacter = $_REQUEST['contactCharacter'];
    $contactTel = $_REQUEST['contactTel'];
    $contactMail = $_REQUEST['contactMail'];
    $sendMail = $_REQUEST['sendMail'];
    $webPage = $_REQUEST['webPage'];
    $caseInfo = $_REQUEST['caseInfo'];

    /* データベース接続 */
    require "dbConnector.php";
    $mysqli = dbConnect();
    $mysqli->set_charset("utf8");
    /* SQL */
    $sql = 'UPDATE crient SET CompanyName = ?, LastApDate = ?, ContactName = ?, ContactCharacter = ?, ContactTel = ?, ContactMail = ?, SendMail = ?, WebPage = ?, CaseInfo = ? WHERE CrientId = ?';

    /* プリペアドステートメント */
    if ($stmt = $mysqli->prepare($sql)) {
      /* 変数のバインド */
      $stmt->bind_param('sssssssssi', $companyName, $lastApDate, $contactName, $contactCharacter, $contactTel, $contactMail, $sendMail, $webPage, $caseInfo, $crientId);

      /* プリペアドステートメント実行 */
      if ($stmt->execute()) {
        print('<div class="row">');
          print('<div class="col-xs-5"><p>顧客情報を更新しました。</p></div>');
        print('</div>');
        print('<div class="col-xs-offset-1 col-xs-11">');
          print('<div class="col-xs-4">');
            print('<p>企業名</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $companyName . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>最終アポ日</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $lastApDate . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>担当者名</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $contactName . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>キャラ</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $contactCharacter . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>担当者電話番号</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $contactTel . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>担当者メールアドレス</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $contactMail . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>送信用メールアドレス</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $sendMail . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>ホームページ</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $webPage . '</p>');
          print('</div>');
          print('<div class="col-xs-4">');
            print('<p>案件情報</p>');
          print('</div>');
          print('<div class="col-xs-8">');
            print('<p>' . $caseInfo . '</p>');
          print('</div>');
        print('</div>');

      } else {
        print('<div class="row">');
          print('<div class="col-xs-5"><p>顧客情報の更新に失敗しました。</p></div>');
        print('</div>');
      }
    }

    ?>

</div>

<?php include('../footer.html'); ?>
