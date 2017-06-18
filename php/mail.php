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
  <?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    /* 入力値取得 */
    $mailTerget = $_REQUEST['mailTerget'];
    $mailSource = $_REQUEST['mailSource'];
    $mailSubject = $_REQUEST['mailSubject'];
    $mailText = $_REQUEST['mailText'];

    /* メールデータ作成 */
    /* メール送信元 */
    $boundary = "__BOUNDARY__";
    $additional_headers = "Content-Type: multipart/mixed;boundary=\"" . $boundary . "\"\n";
    $additional_headers .= "From: " . $mailSource;

    /* メール本文 */
    $message = "--" . $boundary . "\n";
    $message .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
    $message .= $mailText . "\n";

    /* 添付ファイル */
    $fileName1 = $_FILES["attachmentFile1"]["name"];
    if ($fileName1 != "") {
      $tmpFilePath1 = $_FILES["attachmentFile1"]["tmp_name"];
      $newFilePath1 = dirname($tmpFilePath1) . "/" . $fileName1;
      rename($tmpFilePath1, $newFilePath1);

      $message .= "--" . $boundary . "\n";
      $message .= "Content-Type: " . mime_content_type($newFilePath1) . "; name=\"" . basename($newFilePath1) . "\"\n";
      $message .= "Content-Disposition: attachment; filename=\"" . basename($newFilePath1) . "\"\n";
      $message .= "Content-Transfer-Encoding: base64\n";
      $message .= "\n";
      $message .= chunk_split(base64_encode(file_get_contents($newFilePath1)))."\n";
    }

    $fileName2 = $_FILES["attachmentFile2"]["name"];
    if ($fileName2 != "") {
      $tmpFilePath2 = $_FILES["attachmentFile2"]["tmp_name"];
      $newFilePath2 = dirname($tmpFilePath2) . "/" . $fileName2;
      rename($tmpFilePath2, $newFilePath2);

      $message .= "--" . $boundary . "\n";
      $message .= "Content-Type: " . mime_content_type($newFilePath2) . "; name=\"" . basename($newFilePath2) . "\"\n";
      $message .= "Content-Disposition: attachment; filename=\"" . basename($newFilePath2) . "\"\n";
      $message .= "Content-Transfer-Encoding: base64\n";
      $message .= "\n";
      $message .= chunk_split(base64_encode(file_get_contents($newFilePath2)))."\n";
    }

    $fileName3 = $_FILES["attachmentFile3"]["name"];
    if ($fileName3 != "") {
      $tmpFilePath3 = $_FILES["attachmentFile3"]["tmp_name"];
      $newFilePath3 = dirname($tmpFilePath3) . "/" . $fileName3;
      rename($tmpFilePath3, $newFilePath3);

      $message .= "--" . $boundary . "\n";
      $message .= "Content-Type: " . mime_content_type($newFilePath3) . "; name=\"" . basename($newFilePath3) . "\"\n";
      $message .= "Content-Disposition: attachment; filename=\"" . basename($newFilePath3) . "\"\n";
      $message .= "Content-Transfer-Encoding: base64\n";
      $message .= "\n";
      $message .= chunk_split(base64_encode(file_get_contents($newFilePath3)))."\n";
    }

    $fileName4 = $_FILES["attachmentFile4"]["name"];
    if ($fileName4 != "") {
      $tmpFilePath4 = $_FILES["attachmentFile4"]["tmp_name"];
      $newFilePath4 = dirname($tmpFilePath4) . "/" . $fileName4;
      rename($tmpFilePath4, $newFilePath4);

      $message .= "--" . $boundary . "\n";
      $message .= "Content-Type: " . mime_content_type($newFilePath4) . "; name=\"" . basename($newFilePath4) . "\"\n";
      $message .= "Content-Disposition: attachment; filename=\"" . basename($newFilePath4) . "\"\n";
      $message .= "Content-Transfer-Encoding: base64\n";
      $message .= "\n";
      $message .= chunk_split(base64_encode(file_get_contents($newFilePath4)))."\n";
    }

    $fileName5 = $_FILES["attachmentFile5"]["name"];
    if ($fileName5 != "") {
      $tmpFilePath5 = $_FILES["attachmentFile5"]["tmp_name"];
      $newFilePath5 = dirname($tmpFilePath5) . "/" . $fileName5;
      rename($tmpFilePath5, $newFilePath5);

      $message .= "--" . $boundary . "\n";
      $message .= "Content-Type: " . mime_content_type($newFilePath5) . "; name=\"" . basename($newFilePath5) . "\"\n";
      $message .= "Content-Disposition: attachment; filename=\"" . basename($newFilePath5) . "\"\n";
      $message .= "Content-Transfer-Encoding: base64\n";
      $message .= "\n";
      $message .= chunk_split(base64_encode(file_get_contents($newFilePath5)))."\n";
    }

    $message .= "--" . $boundary . "--";

    /* 送信アドレス分ループ */
    $errFlg = "0";
    foreach ($mailTerget as $targetAddress) {

      /* メール送信 */
      if (!mb_send_mail($targetAddress, $mailSubject, $message, $additional_headers)) {
        /* メール送信失敗時の処理を実装 */
        $errFlg = "1";
      }
    }

    mb_send_mail("sales@oplan.co.jp", $mailSubject, $message, $additional_headers);

    if ($errFlg == "0") {
      print("<p>メール送信完了</p>");
    } else {
      print("<p>メール送信失敗</p>");
    }
  ?>

</div>
</body>
</html>
