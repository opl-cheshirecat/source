<?php

  session_start();

  if(!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit;
  }
?>

<?php include('../header.html'); ?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand text-muted">顧客管理システム</a>
    <ul class="nav navbar-nav navbar-right" id="nav">
      <li><a href="../registInput.php">顧客情報登録</a></li>
      <li><a href="../searchInput.php">顧客情報検索</a></li>
      <li class="active"><a href="mailSend.php">メール送信</a></li>
      <li><a href="userRegist.php">ユーザ登録</a></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>メール送信</h2></div>
  </div>

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
    foreach ((array)$mailTerget as $targetAddress) {

      /* メール送信 */
      if (!mb_send_mail($targetAddress, $mailSubject, $message, $additional_headers)) {
        /* メール送信失敗時の処理を実装 */
        $errFlg = "1";
      }
    }

    mb_send_mail("sales@oplan.co.jp", $mailSubject, $message, $additional_headers);

    if ($errFlg == "0") {
      print('<div class="row">');
      print('<p>' . $mailTerget . '</p>');
      print('<p>' . $mailSource . '</p>');
      print('<p>' . $mailSubject . '</p>');
      print('<p>' . $mailText . '</p>');
      print('</div>');
      print('<div class="row">');
        print('<div class="col-xs-5"><p>メール送信完了</p></div>');
      print('</div>');
    } else {
      print('<div class="row">');
        print('<div class="col-xs-5"><p>メール送信失敗</p></div>');
      print('</div>');
    }
  ?>

</div>

<?php include('../footer.html'); ?>
