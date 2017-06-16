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

    /* アップロードファイルパス取得　*/
    $filePath1 = $_FILES["attachmentFile1"]["tmp_name"];
    $filePath2 = $_FILES["attachmentFile2"]["tmp_name"];
    $filePath3 = $_FILES["attachmentFile3"]["tmp_name"];
    $filePath4 = $_FILES["attachmentFile4"]["tmp_name"];
    $filePath5 = $_FILES["attachmentFile5"]["tmp_name"];
    /* アップロードファイルのtype取得 */
    $fileType1 = $_FILES["attachmentFile1"]["type"];
    $fileType2 = $_FILES["attachmentFile2"]["type"];
    $fileType3 = $_FILES["attachmentFile3"]["type"];
    $fileType4 = $_FILES["attachmentFile4"]["type"];
    $fileType5 = $_FILES["attachmentFile5"]["type"];

    /* メールデータ作成 */
    $boundary = "__BOUNDARY__";

    $additional_headers = "Content-Type: multipart/mixed;boundary=\"" . $boundary . "\"\n";
    $additional_headers .= "From: " . $mailSource;

    $message = "--" . $boundary . "\n";

    $message .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $message .= $mailText . "\n";

    $message .= "--" . $boundary . "\n";

    $message .= "Content-Type: " . mime_content_type($fileType1) . "; name=\"" . basename($filePath1) . "\"\n";
    $message .= "Content-Disposition: attachment; filename=\"" . basename($filePath1) . "\"\n";
    $message .= "Content-Transfer-Encoding: base64\n";
    $message .= "\n";
    $message .= chunk_split(base64_encode(file_get_contents($filePath1)))."\n";

    $message .= "--" . $boundary . "--";

    /* 送信アドレス分ループ */
    $errFlg = "0";
    foreach ($mailTerget as $targetAddress) {

      /* メール送信 */
      if (!mb_send_mail($targetAddress, $mailSubject, $mailText, $headers)) {
        /* メール送信失敗時の処理を実装 */
        $errFlg = "1";
      }
    }

    if ($errFlg == "0") {
      print("<p>メール送信完了</p>");
    } else {
      print("<p>メール送信失敗</p>");
    }
  ?>

</div>
</body>
</html>
