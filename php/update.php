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
  <!-- 顧客情報更新 -->
  <div class="main_flame">

    <?php
    /* 入力値取得 */
    $crientId = $_REQUEST['crientId'];
    $corpName = $_REQUEST['corpName'];
    $corpNameKana = $_REQUEST['corpNameKana'];
    $clientAdmin = $_REQUEST['clientAdmin'];
    $corpCEO = $_REQUEST['corpCEO'];
    $corpCEOKana = $_REQUEST['corpCEOKana'];
    $corpZipCode = $_REQUEST['corpZipCode'];
    $corpAddress = $_REQUEST['corpAddress'];
    $corpTel = $_REQUEST['corpTel'];
    $corpFax = $_REQUEST['corpFax'];
    $corpMail1 = $_REQUEST['corpMail1'];
    $corpMail2 = $_REQUEST['corpMail2'];
    $corpHP = $_REQUEST['corpHP'];
    $inchangeName = $_REQUEST['inchangeName'];
    $inchangeKana = $_REQUEST['inchangeKana'];
    $inchangeTel = $_REQUEST['inchangeTel'];
    $inchangeMail = $_REQUEST['inchangeMail'];
    $inchangeAffiliation = $_REQUEST['inchangeAffiliation'];
    $remarks = $_REQUEST['inchangeRemarks'];

    /* データベース接続 */
    $mysqli = new mysqli("localhost", "root", "root", "cheshirecat_test");
    $mysqli->set_charset("utf8");
    /* SQL */
    $sql = 'UPDATE crient SET CorprationName = ? , CorprationNameKana = ?, CrientAdmin = ?, CorpCEOName = ?, CorpCEONameKana = ?, PostalCode = ?, CorpAddress = ?, CorpTelNumber = ?, CorpFaxNumber = ?, CorpMail1 = ?, CorpMail2 = ?, CorpHP = ?, InchageName = ?, InchageNameKana=?, InchageTelNumber=?, InchageMail = ?, InchageAffiliation = ?, Remarks = ? WHERE CrientId = ?';

    /* プリペアドステートメント */
    if ($stmt = $mysqli->prepare($sql)) {
      /* 変数のバインド */
      $stmt->bind_param('ssisssssssssssssssi', $corpName, $corpNameKana, $clientAdmin, $corpCEO, $corpCEOKana, $corpZipCode, $corpAddress, $corpTel, $corpFax, $corpMail1, $corpMail2, $corpHP, $inchangeName, $inchangeKana, $inchangeTel, $inchangeMail, $inchangeAffiliation, $remarks, $crientId);

      /* プリペアドステートメント実行 */
      if ($stmt->execute()) {
        print('<p>顧客情報を更新しました。</p>');
        print('<table class="client_input_form">');
        print('<tr>');
        print('<td class="inputItem">');
        print('顧客ID');
        print('</td>');
        print('<td class="inputForm">');
        print($crientId);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('会社名');
        print('</td>');
        print('<td class="inputForm">');
        print($corpName);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('会社名フリガナ');
        print('</td>');
        print('<td class="inputForm">');
        print($corpNameKana);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('顧客管理区分');
        print('</td>');
        print('<td class="inputForm">');
        print($clientAdmin);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('代表取締役');
        print('</td>');
        print('<td class="inputForm">');
        print($corpCEO);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('代表取締役フリガナ');
        print('</td>');
        print('<td class="inputForm">');
        print($corpCEOKana);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('郵便番号');
        print('</td>');
        print('<td class="inputForm">');
        print($corpZipCode);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('所在地住所');
        print('</td>');
        print('<td class="inputForm">');
        print($corpAddress);
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
        print($corpTel);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('FAX');
        print('</td>');
        print('<td class="inputForm">');
        print($corpFax);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('MAIL1');
        print('</td>');
        print('<td class="inputForm">');
        print($corpMail1);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="contact_info">');
        print('MAIL2');
        print('</td>');
        print('<td class="inputForm">');
        print($corpMail2);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('ホームページ');
        print('</td>');
        print('<td class="inputForm">');
        print($corpHP);
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
        print($inchangeName);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当フリガナ');
        print('</td>');
        print('<td class="inputForm">');
        print($inchangeKana);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当直通TEL');
        print('</td>');
        print('<td class="inputForm">');
        print($inchangeTel);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当MAIL');
        print('</td>');
        print('<td class="inputForm">');
        print($inchangeMail);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('担当所属部課');
        print('</td>');
        print('<td class="inputForm">');
        print($inchangeAffiliation);
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td valign="top" class="inputItem">');
        print('備考');
        print('</td>');
        print('<td class="inputForm">');
        print($remarks);
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
