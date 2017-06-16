<!DOCTYPE html>
<html lang="ja">
<head>
  <title>登録完了画面</title>
  <link rel="stylesheet" type="text/css" href="/cheshirecat/css/style.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

  <!-- ヘッダ -->
  <div class="header">
    <div class="header_system_name">
      顧客管理システム
    </div>

    <div class="header_menu">
      <table class="header_menu">
        <tr>
          <td class="header_menu">
            <a href="/cheshirecat/index.html">
              <p class="header_menu_column">顧客情報登録</p>
            </a>
          </td>
          <td class="header_menu">
            <a href="/cheshirecat/searchInput.html">
              <p class="header_menu_column">顧客情報検索</p>
            </a>
          </td>
          <td class="header_menu">
            <a href="mailSend.php">
              <p class="header_menu_column">メール送信</p>
            </a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <!-- ヘッダ -->

<?php

/* 入力値取得 */
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
$sql = 'INSERT INTO crient ( CompanyName, LastApDate, ContactName, ContactCharacter, ContactTel, ContactMail, SendMail, WebPage, CaseInfo) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)';

/* プリペアドステートメント */
if ($stmt = $mysqli->prepare($sql)) {
  /* 変数のバインド */
  $stmt->bind_param('sssssssss', $companyName, $lastApDate, $contactName, $contactCharacter, $contactTel, $contactMail, $sendMail, $webPage, $caseInfo);

  /* プリペアドステートメント実行 */
  if ($stmt->execute()) {
    print("<p>顧客情報登録完了</p>");
  } else {
    print("<p>顧客情報登録失敗</p>");
  }

}

?>

</body>
</html>
