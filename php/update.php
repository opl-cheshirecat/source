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
  <!-- 顧客情報更新 -->
  <div class="main_flame">

    <?php
    /* 入力値取得 */
    $crientId = $_REQUEST['crientId'];
    $companyName = $_REQUEST['companyName'];
    $lastApDate = $_REQUEST['lastApDate'];
    $contactName = $_REQUEST['contactName'];
    $contactCharacter = $_REQUEST['contactCharacter'];
    $contactTel = $_REQUEST['contactTel'];
    $contactMail = $_REQUEST['contactMail'];
    $sendMail = $_REQUEST['sendMail'];
    $webPage = $_REQUEST['webPage'];
    $caseInfo = $_REQUEST['caseInfo'];

    /* データベース接続 */
    $mysqli = new mysqli("mysql415.db.sakura.ne.jp", "oplan-inc", "oplaninc0213", "oplan-inc_cheshirecat");
    $mysqli->set_charset("utf8");
    /* SQL */
    $sql = 'UPDATE crient SET CompanyName = ?, LastApDate = ?, ContactName = ?, ContactCharacter = ?, ContactTel = ?, ContactMail = ?, SendMail = ?, WebPage = ?, CaseInfo = ? WHERE CrientId = ?';

    /* プリペアドステートメント */
    if ($stmt = $mysqli->prepare($sql)) {
      /* 変数のバインド */
      $stmt->bind_param('sssssssssi', $companyName, $lastApDate, $contactName, $contactCharacter, $contactTel, $contactMail, $sendMail, $webPage, $caseInfo, $crientId);

      /* プリペアドステートメント実行 */
      if ($stmt->execute()) {
        print('<p>顧客情報を更新しました。</p>');
        print('<table class="client_input_form">');
        print('<tr>');
        print('<td class="inputItem">');
        print('企業名');
        print('</td>');
        print('<td class="inputForm">');
        print($companyName);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('最終アポ日');
        print('</td>');
        print('<td class="inputForm">');
        print($lastApDate);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当者名');
        print('</td>');
        print('<td class="inputForm">');
        print($contactName);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('キャラ');
        print('</td>');
        print('<td class="inputForm">');
        print($contactCharacter);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当者電話番号');
        print('</td>');
        print('<td class="inputForm">');
        print($contactTel);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当者メールアドレス');
        print('</td>');
        print('<td class="inputForm">');
        print($contactMail);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('送信用メールアドレス');
        print('</td>');
        print('<td class="inputForm">');
        print($sendMail);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('ホームページ');
        print('</td>');
        print('<td class="inputForm">');
        print($webPage);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('案件情報');
        print('</td>');
        print('<td class="inputForm">');
        print($caseInfo);
        print('</td>');
        print('</tr>');
        print('</table>');
      } else {
        print('<p>顧客情報の更新に失敗しました。</p>');
      }
    }

    ?>

  </div>
  <!-- 顧客情報更新 -->

</body>
</html>
