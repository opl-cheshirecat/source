<html>
<head>
  <title>登録完了画面</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <!-- 左フレーム -->
  <div id="left_frame">
    <div weight="200px">ロゴ</div>
    <div style="weight:200px; height:200px; border:#000000 solid 1px;">
      ＜お知らせ＞<br> ・2016/11/01　申請が許可されました。
      <br> ・2016/11/05　申請が許可されました。
      <br>
      <font color="red">・2016/11/09　差し戻し文書があります。</font><br>
    </div>
    <div style="weight:200px; border:#000000 solid 1px;">
      ID:h.yoshida<br> user:吉田 大樹<br>
      <br>
      <br>
      <a href="draftMailList.html">◆下書きメール一覧</a><br><br>
      <a href="clientDataRegAppHistory.html">◆顧客情報登録申請履歴</a><br><br>
      <a href="clientDataRegAppExchange.html">◆顧客情報登録申請授受</a><br><br>
      <a href="userManage.html">◆ユーザ管理</a><br><br>
      <a href="mailStationeryRegUpd.html">◆メール雛形登録・編集</a><br><br>
    </div>
  </div>

  <div id="right_frame">

<?php

echo mb_internal_encoding();

/* データベース接続 */
try{
$pdo = new PDO('mysql:host=localhost;dbname=cheshirecat_test;charset=utf8','root','root',array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

/* 入力値取得 */
$corpName = $_REQUEST['corpName'];
$corpNameKana = $_REQUEST['corpNameKana'];
$clientAdmin = $_REQUEST['clientAdmin'];
$corpCEO = $_REQUEST['corpCEO'];
$corpCEOKana = $_REQUEST['corpCEOKana'];
$corpZipCode = $_REQUEST['corpZipCode'];
$corpAddress = $_REQUEST['corpAddress'];
$corpTel = $_REQUEST['corpTel'];
$corpFax = $_REQUEST['corpFax'];
$corpMail1 = $_REQUEST['corpMail1'];
$corpMail2 = $_REQUEST['corpMail2'];
$corpHP = $_REQUEST['corpHP'];
$inchangeName = $_REQUEST['inchangeName'];
$inchangeKana = $_REQUEST['inchangeKana'];
$inchangeTel = $_REQUEST['inchangeTel'];
$inchangeMail = $_REQUEST['inchangeMail'];
$inchangeAffiliation = $_REQUEST['inchangeAffiliation'];
$inchangeRemarks = $_REQUEST['inchangeRemarks'];


try{
/* データ登録 */
$stmt = $pdo -> prepare("INSERT INTO crient ( CrientAdmin, CorprationName, CorprationNameKana, CorpCEOName, CorpCEONameKana, PostalCode, CorpAddress, CorpTelNumber, CorpFaxNumber, CorpMail1, CorpMail2, CorpHP, Remarks, InchageName, InchageNameKana, InchageTelNumber, InchageMail, InchageAffiliation ) VALUES ( :CrientAdmin, :CorprationName, :CorprationNameKana, :CorpCEOName, :CorpCEONameKana, :PostalCode, :CorpAddress, :CorpTelNumber, :CorpFaxNumber, :CorpMail1, :CorpMail2, :CorpHP, :Remarks, :InchageName, :InchageNameKana, :InchageTelNumber, :InchageMail, :InchageAffiliation );");
/* 会社名 */
$stmt->bindParam(':CorprationName', $corpName, PDO::PARAM_STR);
/* 会社名フリガナ */
$stmt->bindParam(':CorprationNameKana', $corpNameKana, PDO::PARAM_STR);
/* 顧客管理区分 */
$stmt->bindValue(':CrientAdmin', $clientAdmin, PDO::PARAM_INT);
/* 代表取締役 */
$stmt->bindValue(':CorpCEOName', $corpCEO, PDO::PARAM_INT);
/* 代表取締役フリガナ */
$stmt->bindValue(':CorpCEONameKana', $corpCEOKana, PDO::PARAM_INT);
/* 郵便番号 */
$stmt->bindParam(':PostalCode', $corpZipCode, PDO::PARAM_STR);
/* 所在地住所 */
$stmt->bindParam(':CorpAddress', $corpAddress, PDO::PARAM_STR);
/* 代表連絡先TEL */
$stmt->bindParam(':CorpTelNumber', $corpTel, PDO::PARAM_STR);
/* 代表連絡先FAX */
$stmt->bindParam(':CorpFaxNumber', $corpFax, PDO::PARAM_STR);
/* 代表連絡先MAIL1 */
$stmt->bindParam(':CorpMail1', $corpMail1, PDO::PARAM_STR);
/* 代表連絡先MAIL2 */
$stmt->bindParam(':CorpMail2', $corpMail2, PDO::PARAM_STR);
/* ホームページ */
$stmt->bindParam(':CorpHP', $corpHP, PDO::PARAM_STR);
/* 担当氏名 */
$stmt->bindParam(':InchageName', $inchangeName, PDO::PARAM_STR);
/* 担当フリガナ */
$stmt->bindParam(':InchageNameKana', $inchangeKana, PDO::PARAM_STR);
/* 担当直通TEL */
$stmt->bindParam(':InchageTelNumber', $inchangeTel, PDO::PARAM_STR);
/* 担当MAIL */
$stmt->bindParam(':InchageMail', $inchangeMail, PDO::PARAM_STR);
/* 担当所属部課 */
$stmt->bindParam(':InchageAffiliation', $inchangeAffiliation, PDO::PARAM_STR);
/* 備考 */
$stmt->bindParam(':Remarks', $inchangeRemarks, PDO::PARAM_STR);

$stmt->execute();

} catch (PDOException $e) {
 exit('顧客情報登録失敗。'.$e->getMessage());
}

print("<p>顧客情報登録完了</p>")

?>

</div>
</body>
</html>
