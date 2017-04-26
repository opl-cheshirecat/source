<html>
<head>
  <title>顧客情報検索画面</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php

echo mb_internal_encoding();

/* データベース接続 */
try{
$pdo = new PDO('mysql:host=localhost;dbname=cheshirecat_test;charset=utf8','root','root',array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}

/* 検索値取得 */
$corpName = $_REQUEST['corpName'];
$corpNameKana = $_REQUEST['corpNameKana'];
$clientAdmin = $_REQUEST['clientAdmin'];
$corpAddress = $_REQUEST['corpAddress'];
$inchangeName = $_REQUEST['inchangeName'];
$inchangeKana = $_REQUEST['inchangeKana'];

try {
/*
$data = array($corpName, $corpNameKana, $clientAdmin, $corpAddress, $inchangeName, $inchangeKana);
$sql = "SELECT * FROM crient WHERE ".
implode( ' and ', array_fill(0, count($data), '`data_name` REGEXP ?') );
$stmt = $pdo->prepare($sql);

//パラメータ用配列を作る
$stmtParams = array( str_repeat( 's', count($data) ) );
//$stmtParams[1]～にそれぞれデータを参照渡しする
//※ここは参照渡しでないとNG
foreach ($data as $k=>$v){
  $stmtParams[] = &$data[$k];
}

//call_user_func_array経由でbind_paramに渡す
call_user_func_array(array($stmt, 'bind_param'), $stmtParams);
*/

$sql = "SELECT * FROM crient WHERE ";
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
