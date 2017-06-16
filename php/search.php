<!DOCTYPE html>
<html lang="ja">
<head>
  <title>顧客情報検索画面</title>
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
            <a href="../index.html">
              <p class="header_menu_column">顧客情報登録</p>
            </a>
          </td>
          <td class="header_menu">
            <a href="../searchInput.html">
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
  <!-- 検索結果表示部 -->
  <div class="main_flame">
  <h2 class="main_flame_title">顧客情報検索結果</h2>

<?php

/* 検索値取得 */
$companyName = trim($_REQUEST['companyName']);
$lastApDate = trim($_REQUEST['lastApDate']);
$contactName = trim($_REQUEST['contactName']);
$caseInfo = trim($_REQUEST['caseInfo']);

/* SQL文組み立て */
$sqlWhere = [];
$sqlParams = [];
$sqlParams[0] = "";
$sql = 'SELECT * FROM crient';
// 企業名
if (!empty($companyName)) {
  $sqlWhere[] = "CompanyName LIKE ?";
  $sqlParams[0] .= "s";
  $sqlParams[] = '%' . $companyName . '%';
}
// 最終あぽ日
if (!empty($lastApDate)) {
  $sqlWhere[] = "LastApDate LIKE ?";
  $sqlParams[0] .= "s";
  $sqlParams[] = '%' . $lastApDate . '%';
}
// 担当者名
if (!empty($contactName)) {
$sqlWhere[] = "ContactName LIKE ?";
$sqlParams[0] .= "s";
$sqlParams[] = '%' . $contactName . '%';
}
// 案件情報
if (!empty($caseInfo)) {
$sqlWhere[] = "CaseInfo LIKE ?";
$sqlParams[0] .= "s";
$sqlParams[] = '%' . $caseInfo . '%';
}

// where句作成
if(count($sqlWhere) > 0) {
  $sql .= ' WHERE ' . implode(" AND ", $sqlWhere);
}

// bind_paramに渡す引数を参照渡しに変更
$params = [];
foreach ($sqlParams as $key => $value) {
      $params[$key] = &$sqlParams[$key];
}

try {
  /* データベース接続 */
  require "dbConnector.php";
  $mysqli = dbConnect();
  $mysqli->set_charset("utf8");

  // プリペアドステートメント
  if ($stmt = $mysqli->prepare($sql)) {
    // 変数のバインド
    if (count($sqlWhere) > 0) {
      call_user_func_array(array($stmt, 'bind_param'), $params);
    }

    // プリペアドステートメントの実行
    if ($stmt->execute()) {
        // 結果の取得
        $result = $stmt->get_result();
        $cnt = $result->num_rows;

        // 結果を出力
        if ($cnt == 0) {
          print('該当するデータがありません。<br>');
        } else {
          print('<table border="1" cellspacing="0">');
          print('<tr class="search_result_header">');
          print('<th>企業名</th>');
          print('<th>最終アポ日</th>');
          print('<th>担当者名</th>');
          print('<th>担当者電話番号</th>');
          print('<th>担当者メールアドレス</th>');
          print('<th>メール送信用メールアドレス</th>');
          print('<th>更新</th>');
          print('</tr>');
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            print('<tr>');
            print('<td>' . $row['CompanyName'] . '</td>');
            print('<td>' . $row['LastApDate'] . '</td>');
            print('<td>' . $row['ContactName'] . '</td>');
            print('<td>' . $row['ContactTel'] .'</td>');
            print('<td>' . $row['ContactMail'] . '</td>');
            print('<td>' . $row['SendMail'] . '</td>');
            print('<td><form action="updateInput.php" method="post"><button name="crientId" value="' . $row['CrientId'] . '">更新</button></form></td>');
            print('</tr>');
          }
          print('</table>');
        }
        // 結果セットを開放
        $result->free();
    }
    // ステートメントの終了
    $stmt->close();
  // 接続の終了
  $mysqli->close();
}
} catch (PDOException $e) {
  exit('顧客情報検索失敗。'.$e->getMessage());
}

 ?>

</div>
  <!-- 検索結果表示部 -->

</body>
</html>
