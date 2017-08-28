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
      <li class="active"><a href="../registInput.php">顧客情報登録</a></li>
      <li><a href="../searchInput.php">顧客情報検索</a></li>
      <li><a href="mailSend.php">メール送信</a></li>
      <li><a href="userRegist.php">ユーザ登録</a></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>顧客情報登録</h2></div>
  </div>

<?php

/* 入力値取得 */
$companyName = $_REQUEST['companyName'];
$companyRank = $_REQUEST['companyRank'];
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
$sql = 'INSERT INTO crient ( CompanyName, ContactName, ContactCharacter, ContactTel, ContactMail, SendMail, WebPage, CaseInfo, CompanyRank) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)';

/* プリペアドステートメント */
if ($stmt = $mysqli->prepare($sql)) {
  /* 変数のバインド */
  $stmt->bind_param('sssssssss', $companyName, $contactName, $contactCharacter, $contactTel, $contactMail, $sendMail, $webPage, $caseInfo, $companyRank);

  /* プリペアドステートメント実行 */
  if ($stmt->execute()) {
    print('<div class="row">');
      print('<div class="col-xs-5"><p>顧客情報登録完了</p></div>');
    print('</div>');
  } else {
    print('<div class="row">');
      print('<p>' . $stmt->error . '</p>');
      print('<div class="col-xs-5"><p>顧客情報登録失敗</p></div>');
    print('</div>');
  }

}

?>

</div>

<?php include('../footer.html'); ?>
