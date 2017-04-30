<html>
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
            <a href="/cheshirecat/index.html">
              <p class="header_menu_column">顧客情報登録</p>
            </a>
          </td>
          <td class="header_menu">
            <a href="/cheshirecat/searchInput.html">
              <p class="header_menu_column">顧客情報検索</p>
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
$corpName = trim($_REQUEST['corpName']);
$corpNameKana = trim($_REQUEST['corpNameKana']);
$clientAdmin = trim($_REQUEST['clientAdmin']);
$corpAddress = trim($_REQUEST['corpAddress']);
$inchangeName = trim($_REQUEST['inchangeName']);
$inchangeKana = trim($_REQUEST['inchangeKana']);

/* SQL文組み立て */
$sqlWhere = [];
$sqlParams = [];
$sqlParams[0] = "";
$sql = 'SELECT * FROM crient';
// 会社名
if (!empty($corpName)) {
  $sqlWhere[] = "CorprationName LIKE ?";
  $sqlParams[0] .= "s";
  $sqlParams[] = '%' . $corpName . '%';
}
// 会社名フリガナ
if (!empty($corpNameKana)) {
  $sqlWhere[] = "CorprationName LIKE ?";
  $sqlParams[0] .= "s";
  $sqlParams[] = '%' . $corpNameKana . '%';
}
// 顧客管理区分
if (!empty($clientAdmin)) {
$sqlWhere[] = "CrientAdmin LIKE ?";
$sqlParams[0] .= "i";
$sqlParams[] = '%' . $clientAdmin . '%';
}
// 所在地住所
if (!empty($corpAddress)) {
$sqlWhere[] = "CorpAddress LIKE ?";
$sqlParams[0] .= "s";
$sqlParams[] = '%' . $corpAddress . '%';
}
// 担当氏名
if (!empty($inchangeName)) {
$sqlWhere[] = "InchageName LIKE ?";
$sqlParams[0] .= "s";
$sqlParams[] = '%' . $inchangeName . '%';
}
// 担当フリガナ
if (!empty($inchangeKana)) {
$sqlWhere[] = "InchageName LIKE ?";
$sqlParams[0] .= "s";
$sqlParams[] = '%' . $inchangeKana . '%';
}

// where句作成
if(count($sqlWhere) > 0) {
  $sql .= ' WHERE ' . implode(",", $sqlWhere);
}

// bind_paramに渡す引数を参照渡しに変更
$params = [];
foreach ($sqlParams as $key => $value) {
      $params[$key] = &$sqlParams[$key];
}

try {
  /* データベース接続 */
  $mysqli = new mysqli("localhost", "root", "root", "cheshirecat_test");
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
          print('<table>');
          print('<tr>');
          print('<th>顧客ID</th>');
          print('<th>顧客管理区分</th>');
          print('<th>会社名</th>');
          print('<th>会社名フリガナ</th>');
          print('<th>住所</th>');
          print('<th>担当者氏名</th>');
          print('<th>担当者フリガナ</th>');
          print('</tr>');
          while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            print('<tr>');
            print('<td>' . $row['CrientId'] . '</td>');
            print('<td>' . $row['CrientAdmin'] . '</td>');
            print('<td>' . $row['CorprationName'] . '</td>');
            print('<td>' . $row['CorprationNameKana'] . '</td>');
            print('<td>' . $row['CorpAddress'] .'</td>');
            print('<td>' . $row['InchageName'] . '</td>');
            print('<td>' . $row['InchageNameKana'] . '</td>');
            print('</tr>');
          }
          print('<table>');
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
