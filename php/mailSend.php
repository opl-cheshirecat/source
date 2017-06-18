<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/cheshirecat/css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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
  <div class="main_flame">
    <h2 class="main_flame_title">メール送信</h2>
    <form action="mail.php" enctype="multipart/form-data" method="post">

      <!-- メール内容入力 -->
      <table border="0" >
        <tr>
          <td>
            送信元アドレス
          </td>
          <td>
            <input type="text" name="mailSource" size=50>
          </td>
        </tr>
        <tr>
          <td>
            件名
          </td>
          <td>
            <input type="text" name="mailSubject" size=50>
          </td>
        </tr>
        <tr>
          <td class="mail_input">
            本文
          </td>
          <td>
            <textarea name="mailText" rows=30 cols=50></textarea>
          </td>
        </tr>
        <tr>
          <td class="mail_input">
            添付ファイル１
          </td>
          <td>
            <input type="file" name="attachmentFile1" size=50>
          </td>
        </tr>
        <tr>
          <td class="mail_input">
            添付ファイル２
          </td>
          <td>
            <input type="file" name="attachmentFile2" size=50>
          </td>
        </tr>
        <tr>
          <td class="mail_input">
            添付ファイル３
          </td>
          <td>
            <input type="file" name="attachmentFile3" size=50>
          </td>
        </tr>
        <tr>
          <td class="mail_input">
            添付ファイル４
          </td>
          <td>
            <input type="file" name="attachmentFile4" size=50>
          </td>
        </tr>
        <tr>
          <td class="mail_input">
            添付ファイル５
          </td>
          <td>
            <input type="file" name="attachmentFile5" size=50>
          </td>
        </tr>
      </table>
      <!-- メール内容入力 -->

      <!-- アドレス一覧 -->
      <div id="targets">
      <table border="1" cellspacing="0">
        <tr>
          <th>
            <input type="checkbox" name="mailTerget_all" id="mailTerget_all" />
          </th>
          <th>
            企業名
          </th>
          <th>
            担当者名
          </th>
          <th>
            送信用メールアドレス
          </th>
        </tr>

        <?php
          /* データベース接続 */
          require "dbConnector.php";
          $mysqli = dbConnect();
          $mysqli->set_charset("utf8");
          $sql = 'SELECT CompanyName, ContactName, SendMail FROM crient ORDER BY CrientId';

          /* プリペアドステートメント */
          if ($stmt = $mysqli->prepare($sql)) {
            /* プリペアドステートメント実行 */
            if ($stmt->execute()) {
              /* 結果取得 */
              $result = $stmt->get_result();
              $cnt = $result->num_rows;

              /* 結果出力 */
              if ($cnt != 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                  print('<tr>');
                  print('<td>');
                  print('<input type="checkbox" name="mailTerget[]" value="' . $row['SendMail'] . '" class="check" />');
                  print('</td>');
                  print('<td>');
                  print($row['CompanyName']);
                  print('</td>');
                  print('<td>');
                  print($row['ContactName']);
                  print('</td>');
                  print('<td>');
                  print($row['SendMail']);
                  print('</td>');
                  print('</tr>');
                }
              }

              // 結果セットを開放
              $result->free();
            }
          }
          // 接続の終了
          $mysqli->close();
        ?>

      </table>
    </div>

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

  <script type="text/javascript">
    $(function() {
      $('#mailTerget_all').on('click', function() {
        $('.check').prop('checked', this.checked);
      });

      $('.check').on('click', function() {
        if ($('#targets :checked').length == $('#targets :input').length){
          $('#mailTerget_all').prop('checked', 'checked');
        }else{
          $('#mailTerget_all').prop('checked', false);
        }
      });
    });
  </script>

</body>
</html>
