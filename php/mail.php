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
            <a href="php/mailSend.php">
              <p class="header_menu_column">メール送信</p>
            </a>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <!-- ヘッダ -->
  <div class="main_flame">
  <?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    /* 入力値取得 */
    $mailTerget = $_REQUEST['mailTerget'];
    $mailSource = $_REQUEST['mailSource'];
    $mailSubject = $_REQUEST['mailSubject'];
    $mailText = $_REQUEST['mailText'];
    $headers = 'From: ' . $mailSource . '\n';

    /* 配列分ループ */
    /* $address) {

      if (mb_send_mail($address, $mailSubject, $mailText, $headers)) {
        print('送信成功');
      } else {
        print('送信失敗');
      }

    }
    */

    mb_send_mail("hrkysd.s@gmail.com", "sub", "text", "From:h.yoshida@oplan.co.jp");

  ?>

</div>
</body>
</html>
