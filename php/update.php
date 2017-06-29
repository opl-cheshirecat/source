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
        print('<table class="table">');
          print('<tr>');
            print('<td>企業名</td>');
            print('<td>' . $companyName . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>最終アポ日</td>');
            print('<td>' . $lastApDate . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>担当者名</td>');
            print('<td>' . $contactName . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>キャラ</td>');
            print('<td>' . $contactCharacter . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>担当者電話番号</td>');
            print('<td>' . $contactTel . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>担当者メールアドレス</td>');
            print('<td>' . $contactMail . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>送信用メールアドレス</td>');
            print('<td>' . $sendMail . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>ホームページ</td>');
            print('<td>' . $webPage . '</td>');
          print('</tr>');
          print('<tr>');
            print('<td>案件情報</td>');
            print('<td>' . $caseInfo . '</td>');
          print('</tr>');
        print('</table>');

      } else {
        print('<div class="row">');
          print('<div class="col-xs-5"><p>顧客情報の更新に失敗しました。</p></div>');
        print('</div>');
      }
    }

    ?>

</div>

<?php include('../footer.html'); ?>
