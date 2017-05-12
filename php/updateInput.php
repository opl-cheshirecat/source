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
            <a href="/cheshirecat/registInput.html">
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
  $mysqli = new mysqli("localhost", "root", "root", "cheshirecat_test");
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
        print('顧客ID');
        print('</td>');
        print('<td class="inputForm">');
        print($row['CrientId']);
        print('<input type="hidden" name="crientId" value="' . $row['CrientId'] . '"">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('会社名');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpName" class="basicForm" value="' . $row['CorprationName'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('会社名フリガナ');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpNameKana" class="basicForm" value="' . $row['CorprationNameKana'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('顧客管理区分');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="clientAdmin" class="basicForm" value="' . $row['CrientAdmin'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('代表取締役');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpCEO" class="basicForm" value="' . $row['CorpCEOName'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('代表取締役フリガナ');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpCEOKana" class="basicForm" value="' . $row['CorpCEONameKana'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('郵便番号');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpZipCode" class="basicForm" value="' . $row['PostalCode'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('所在地住所');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpAddress" class="basicForm" value="' . $row['CorpAddress'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('代表連絡先');
        print('</td>');
        print('<td>');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('TEL');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpTel" class="basicForm" value="' . $row['CorpTelNumber'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('FAX');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpFax" class="basicForm" value="' . $row['CorpFaxNumber'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('MAIL1');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpMail1" class="basicForm" value="' . $row['CorpMail1'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('MAIL2');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpMail2" class="basicForm" value="' . $row['CorpMail2'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('ホームページ');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="corpHP" class="basicForm" value="' .$row['CorpHP'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td>&nbsp;</td>');
        print('<td>&nbsp;</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当氏名');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="inchangeName" class="basicForm" value="' . $row['InchageName'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当フリガナ');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="inchangeKana" class="basicForm" value="' . $row['InchageNameKana'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当直通TEL');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="inchangeTel" class="basicForm" value="' . $row['InchageTelNumber'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当MAIL');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="inchangeMail" class="basicForm" value="' . $row['InchageMail'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当所属部課');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="inchangeAffiliation" class="basicForm" value="' . $row['InchageAffiliation'] . '">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td valign="top" class="inputItem">');
        print('備考');
        print('</td>');
        print('<td class="inputForm">');
        print('<textarea name="inchangeRemarks" rows="10" class="basicForm" value="' . $row['Remarks'] . '"></textarea>');
        print('</td>');
        print('</tr>');
        print('</table>');

        /* ボタンエリア */
        print('<table class="button_area" width="80%">');
        print('<tr>');
        print('<td align="center">');
        print('<button type="submit" name="update_button" value="1">更新</button>');
        print('</td>');
        print('<td align="center">');
        print('<button type="submit" name="return_button" value="2">戻る</button>');
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
