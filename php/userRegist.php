<?php

  session_start();

  if(!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit;
  }
?>


<?php include('../header.html'); ?>

<?php
/* データベース接続 */
require "dbConnector.php";
$mysqli = dbConnect();
$mysqli->set_charset("utf8");

$status = "none";

if(!empty($_POST["username"]) && !empty($_POST["password"])){
  //パスワードはハッシュ化する
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  //ユーザ入力を使用するのでプリペアドステートメントを使用
  $stmt = $mysqli->prepare("INSERT INTO users ( username, password ) VALUES (?, ?)");
  $stmt->bind_param('ss', $_POST["username"], $password);

  if($stmt->execute()) {
    $status = "ok";
  } else {
    //既に存在するユーザ名だった場合INSERTに失敗する
    $status = "failed";
  }
}

?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand text-muted">顧客管理システム</a>
    <ul class="nav navbar-nav navbar-right" id="nav">
      <li><a href="../registInput.php">顧客情報登録</a></li>
      <li><a href="../searchInput.php">顧客情報検索</a></li>
      <li><a href="mailSend.php">メール送信</a></li>
      <li class="active"><a href="userRegist.php">ユーザ登録</a></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>ユーザ登録</h2></div>
  </div>

  <?php if($status == "ok"): ?>
    <p>登録完了</p>
  <?php elseif($status == "failed"): ?>
    <p>エラー：既に存在するユーザ名です。</p>
  <?php else: ?>
    <form method="POST" action="userRegist.php">
      <div class="form-group">
        <div class="row">
          <div class="col-xs-2">
            <label>ユーザ名</label>
          </div>
          <div class="col-xs-4">
            <input type="text" name="username" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-xs-2">
            <label>パスワード</label>
          </div>
          <div class="col-xs-4">
            <input type="text" name="password" class="form-control">
          </div>
        </div>
      </div>
      <button type="submit" class="btn">登録</button>
    </form>
  <?php endif; ?>
</div>

<?php include('../footer.html'); ?>
