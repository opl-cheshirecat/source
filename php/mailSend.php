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

  <div class="row">
    <form action="mail.php" enctype="multipart/form-data" method="post">
      <div class="col-xs-6">
        <div class="form-group">
          <label>送信元アドレス</label>
          <input type="text" name="mailSource" class="form-control">
        </div>
        <div class="form-group">
          <label>件名</label>
          <input type="text" name="mailSubject" class="form-control">
        </div>
        <div class="form-group">
          <label>本文</label>
          <textarea name="mailText" rows=30 class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>添付ファイル１</label>
          <input type="file" name="attachmentFile1" class="form-control">
        </div>
        <div class="form-group">
          <label>添付ファイル２</label>
          <input type="file" name="attachmentFile2" class="form-control">
        </div>
        <div class="form-group">
          <label>添付ファイル３</label>
          <input type="file" name="attachmentFile3" class="form-control">
        </div>
        <div class="form-group">
          <label>添付ファイル４</label>
          <input type="file" name="attachmentFile4" class="form-control">
        </div>
        <div class="form-group">
          <label>添付ファイル５</label>
          <input type="file" name="attachmentFile5" class="form-control">
        </div>
        <button type="submit">送信</button>
      </div>
      <div class="col-xs-6">
      
        <input type="checkbox" name="rankA" id="rankA">A
        <input type="checkbox" name="rankB" id="rankB">B
        <input type="checkbox" name="rankC" id="rankC">C
       
        <table class="table table-hover">
          <tr>
            <th></th>
            <th>企業名</th>
            <th>担当者名</th>
            <th>送信用メールアドレス</th>
          </tr>

          <?php
            /* データベース接続 */
            require "dbConnector.php";
            $mysqli = dbConnect();
            $mysqli->set_charset("utf8");
            $sql = 'SELECT CompanyName, CompanyRank, ContactName, SendMail FROM crient ORDER BY CrientId';

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
                    print('<input type="checkbox" name="mailTerget[]" id="' . $row['CompanyRank'] . '" value="' . $row['SendMail'] . '" class="check" />');
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
    </form>
  </div>
</div>

<script type="text/javascript">

  $('#rankA').click(function() {
    if ($('#rankA').prop('checked')) {
      $('input[id="A"]').prop('checked', true);
    } else {
      $('input[id="A"]').prop('checked', false);
    }
  });

  $('#rankB').click(function() {
    if ($('#rankB').prop('checked')) {
      $('input[id="B"]').prop('checked', true);
    } else {
      $('input[id="B"]').prop('checked', false);
    }
  });

  $('#rankC').click(function() {
    if ($('#rankC').prop('checked')) {
      $('input[id="C"]').prop('checked', true);
    } else {
      $('input[id="C"]').prop('checked', false);
    }
  });

</script>

<?php include('../footer.html'); ?>
