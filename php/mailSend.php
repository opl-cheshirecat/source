<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/cheshirecat/css/style.css">
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
              <p class="header_menu_column">メール送信</p>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <!-- ヘッダ -->
  <div class="main_flame">

  <form action="mail.php" method="post">
  <!-- メールフォーム -->
  <table>
    <tr>
      <td>
        <!-- メール内容入力 -->
          <div class="mailForm">
        <table>
          <tr>
            <td>
              送信元アドレス
            </td>
            <td>
              <input type="text" name="mailSource" class="mailSourceInput">
            </td>
          </tr>
          <tr>
            <td>
              件名
            </td>
            <td>
              <input type="text" name="mailSubject" class="mailSubjectInput">
            </td>
          </tr>
          <tr>
            <td>
              本文
            </td>
            <td>
              <textarea rows="25" name="mailText" class="mailTextInput"></textarea>
            </td>
          </tr>
        </table>
      </div>
        <!-- メール内容入力 -->
      </td>
      <td>
        <!-- アドレス一覧 -->
        <div class="address_list">
        <table border="1" cellspacing="0">
          <tr>
            <th>
            </th>
            <th>
              会社名
            </th>
            <th>
              担当者名
            </th>
            <th>
              メールアドレス
            </th>
          </tr>
          <?php
            /* データベース接続 */
            $mysqli = new mysqli("localhost", "root", "root", "cheshirecat_test");
            $mysqli->set_charset("utf8");
            $sql = 'SELECT CorprationName, InchageName, InchageMail FROM crient';

            /* プリペアドステートメント */
            if ($stmt = $mysqli->prepare($sql)) {
              /* プリペアドステートメント実行 */
              if ($stmt->execute()) {
                /* 結果取得 */
                $result = $stmt->get_result();
                $cnt = $result->num_rows;

                /* 結果出力 */
                if ($cnt == 0) {
                  print('該当するデータがありません。');
                } else {
                  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    print('<tr>');
                    print('<td>');
                    print('<input type="checkbox" name="mailTerget[]" value="' . $row['InchageMail'] . '"');
                    print('</td>');
                    print('<td>');
                    print($row['CorprationName']);
                    print('</td>');
                    print('<td>');
                    print($row['InchageName']);
                    print('</td>');
                    print('<td>');
                    print($row['InchageMail']);
                    print('</td>');
                    print('</tr>');
                  }
                }

                // 結果セットを開放
                $result->free();
              }
            }
              // ステートメントの終了
              $stmt->close();
              // 接続の終了
              $mysqli->close();
          ?>
        </table>
      </div>
        <!-- アドレス一覧 -->
      </td>
    </tr>
  </table>
  <!-- メールフォーム -->
  <table class="button_area" width="80%">
    <tr>
      <td>
        <button type="submit" name="mail_button" value="1">メール送信</button>
      </td>
    </tr>
  </table>
</form>

</div>
</body>
</html>
