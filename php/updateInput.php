<!DOCTYPE html>
<html lang="ja">
<head>
  <title>顧客情報詳細画面</title>
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
  <!-- 顧客情報表示部 -->
  <div class="main_flame">
  <h2 class="main_flame_title">顧客情報詳細</h2>

  <?php
  /* 顧客ID取得 */
  $crientId = $_REQUEST['crientId'];

  /* データベース接続 */
  $mysqli = new mysqli("mysql415.db.sakura.ne.jp", "oplan-inc", "oplaninc0213", "oplan-inc_cheshirecat");
  $mysqli->set_charset("utf8");
  /* SQL */
  $sql = 'SELECT * FROM crient WHERE CrientId = ?';

  /* プリペアドステートメント */
  if ($stmt = $mysqli->prepare($sql)) {
    /* 変数のバインド */
    $stmt->bind_param('i', $crientId);

    /* プリペアドステートメント実行 */
    if ($stmt->execute()) {
      /* 結果の取得 */
      $result = $stmt->get_result();
      $cnt = $result->num_rows;

      /* 結果出力 */
      if ($cnt == 0) {
        print('該当するデータがありません。<br>');
      } else {
        /* 入力フォーム */
        $row = $result->fetch_array(MYSQLI_ASSOC);
        print('<form action="update.php" method="post">');
        print('<table class="client_input_form">');
        print('<tr>');
        print('<td class="inputItem">');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="hidden" name="crientId" value="' . $row['CrientId'] . '"">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('企業名');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="companyName" class="basicForm" value="' . $row['CompanyName'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('最終アポ日');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="lastApDate" class="basicForm" value="' . $row['LastApDate'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当者名');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="contactName" class="basicForm" value="' . $row['ContactName'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('キャラ');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="contactCharacter" class="basicForm" value="' . $row['ContactCharacter'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当者電話番号');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="contactTel" class="basicForm" value="' . $row['ContactTel'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当者メールアドレス');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="contactMail" class="basicForm" value="' . $row['ContactMail'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('送信用メールアドレス');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="sendMail" class="basicForm" value="' . $row['SendMail'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('ホームページ');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="webPage" class="basicForm" value="' . $row['WebPage'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td valign="top" class="inputItem">');
        print('案件情報');
        print('</td>');
        print('<td class="inputForm">');
        print('<textarea name="caseInfo" cols=50 rows=5 class="basicForm">' . $row['CaseInfo'] . '</textarea>');
        print('</td>');
        print('</tr>');
        print('</table>');

        /* ボタンエリア */
        print('<table class="button_area" width="80%">');
        print('<tr><td></td></tr>');
        print('<tr>');
        print('<td align="center">');
        print('<button type="submit" name="update_button" value="1">更新</button>');
        print('</td>');
        print('</tr>');
        print('</table>');

        print('</form>');
      }
    }
  }

  ?>
  </div>
  <!-- 顧客情報表示部 -->
</body>
</html>
