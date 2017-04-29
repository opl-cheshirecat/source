<html>
<head>
  <title>顧客情報検索画面</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php

/* データベース接続 */
try{
$pdo = new PDO('mysql:host=localhost;dbname=cheshirecat_test;charset=utf8','root','root',array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

/* 検索値取得 */
$corpName = trim($_REQUEST['corpName']);
$corpNameKana = trim($_REQUEST['corpNameKana']);
$clientAdmin = trim($_REQUEST['clientAdmin']);
$corpAddress = trim($_REQUEST['corpAddress']);
$inchangeName = trim($_REQUEST['inchangeName']);
$inchangeKana = trim($_REQUEST['inchangeKana']);



try {

if () {

}

$sql = "SELECT * FROM crient";



$stmt = $pdo->prepare($spl);
// 実行
$stmt->execute();

print('<table>');
while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  print('<tr>');
  print('<td>');print($result['CrientId']);print('</td>');
  print('<td>');print($result['CrientAdmin']);print('</td>');
  print('<td>');print($result['CorprationName']);print('</td>');
  print('<td>');print($result['CorprationNameKana']);print('</td>');
  print('<td>');print($result['CorpCEOName']);print('</td>');
  print('<td>');print($result['CorpCEONameKana']);print('</td>');
  print('<td>');print($result['PostalCode']);print('</td>');
  print('<td>');print($result['CorpAddress']);print('</td>');
  print('<td>');print($result['CorpTelNumber']);print('</td>');
  print('<td>');print($result['CorpFaxNumber']);print('</td>');
  print('<td>');print($result['CorpMail1']);print('</td>');
  print('<td>');print($result['CorpMail2']);print('</td>');
  print('<td>');print($result['CorpHP']);print('</td>');
  print('<td>');print($result['Remarks']);print('</td>');
  print('<td>');print($result['InchageName']);print('</td>');
  print('<td>');print($result['InchageNameKana']);print('</td>');
  print('<td>');print($result['InchageTelNumber']);print('</td>');
  print('<td>');print($result['InchageMail']);print('</td>');
  print('<td>');print($result['InchageAffiliation']);print('</td>');
  print('</tr>');
}
print('</table>');








} catch (PDOException $e) {
  exit('顧客情報検索失敗。'.$e->getMessage());
}

 ?>

</body>
</html>
