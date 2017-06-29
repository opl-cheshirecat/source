<?php

//セッション開始
session_start();

/* データベース接続 */
require "php/dbConnector.php";
$mysqli = dbConnect();
$mysqli->set_charset("utf8");

$status = "none";

//セッションにセットされていたらログイン済み
if(isset($_SESSION["username"])) {
  header('Location: registInput.php');
  exit();

} else if (!empty($_POST["username"]) && !empty($_POST["password"])){
  //ユーザ名が一致する行を探す
  $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
  $stmt->bind_param('s', $_POST["username"]);
  $stmt->execute();

  //結果を保存
  $stmt->store_result();
  //結果の行数が1だったら成功
  if($stmt->num_rows == 1){
    $stmt->bind_result($pass);
    while ($stmt->fetch()) {
      if(password_verify($_POST["password"], $pass)){
        $status = "ok";
        //セッションにユーザ名を保存
        $_SESSION["username"] = $_POST["username"];
        header('Location: registInput.php');
        exit();
      }else{
        $status = "failed";
        break;
      }
    }
  } else {
    $status = "failed";
  }
}

?>

<?php include('header.html'); ?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand text-muted">顧客管理システム</a>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>ログイン</h2></div>
  </div>

  <?php if($status == "failed"): ?>
    <div class="row">
      <div class="col-xs-offset-1">
        <p><font color="red">ログイン失敗</font></p>
      </div>
    </div>
  <?php endif; ?>

  <form method="POST" action="index.php">
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
          <input type="password" name="password" class="form-control">
        </div>
      </div>
    </div>
    <button type="submit" class="btn">ログイン</button>
  </form>
</div>

<?php include('footer.html'); ?>
