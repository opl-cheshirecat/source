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

/* データベース接続 */
try{
$pdo = new PDO('mysql:host=mysql415.db.sakura.ne.jp;dbname=oplan-inc_cheshirecat;charset=utf8','oplan-inc','oplaninc0213',array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

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

try{
/* データ登録 */
$stmt = $pdo -> prepare("INSERT INTO crient ( CompanyName, LastApDate, ContactName, ContactCharacter, ContactTel, ContactMail, SendMail, WebPage, CaseInfo) VALUES ( :CompanyName, :LastApDate, :ContactName, :ContactCharacter, :ContactTel, :ContactMail, :SendMail, :WebPage, :CaseInfo);");
$stmt->bindValue(':CompanyName', $companyName, PDO::PARAM_STR);
$stmt->bindValue(':LastApDate', $lastApDate, PDO::PARAM_STR);
$stmt->bindValue(':ContactName', $contactName, PDO::PARAM_STR);
$stmt->bindValue(':ContactCharacter', $contactCharacter, PDO::PARAM_STR);
$stmt->bindValue(':ContactTel', $contactTel, PDO::PARAM_STR);
$stmt->bindValue(':ContactMail', $contactMail, PDO::PARAM_STR);
$stmt->bindValue(':SendMail', $sendMail, PDO::PARAM_STR);
$stmt->bindValue(':WebPage', $webPage, PDO::PARAM_STR);
$stmt->bindValue(':CaseInfo', $caseInfo, PDO::PARAM_STR);

$stmt->execute();

print("<p>顧客情報登録完了</p>");

} catch (PDOException $e) {
 exit('顧客情報登録失敗。'.$e->getMessage());
}

?>

</body>
</html>
