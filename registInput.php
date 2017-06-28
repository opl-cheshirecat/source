<?php

  session_start();

  if(!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
  }
?>

<?php include('header.html'); ?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand text-muted">顧客管理システム</a>
    <ul class="nav navbar-nav navbar-right" id="nav">
      <li class="active"><a href="registInput.php">顧客情報登録</a></li>
      <li><a href="searchInput.php">顧客情報検索</a></li>
      <li><a href="php/mailSend.php">メール送信</a></li>
      <li><a href="php/userRegist.php">ユーザ登録</a></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>顧客情報登録</h2></div>
  </div>

  <form action="php/regist.php" method="post">
    <div class="form-group">
      <label>企業名</label>
      <input type="text" name="companyName" class="form-control">
    </div>
    <div class="form-group">
      <label>最終アポ日(yyyy/mm/dd)</label>
      <input type="text" name="lastApDate" class="form-control">
    </div>
    <div class="form-group">
      <label>担当者名</label>
      <input type="text" name="contactName" class="form-control">
    </div>
    <div class="form-group">
      <label>キャラ</label>
      <input type="text" name="contactCharacter" class="form-control">
    </div>
    <div class="form-group">
      <label>担当者電話番号</label>
      <input type="text" name="contactTel" class="form-control">
    </div>
    <div class="form-group">
      <label>担当者メールアドレス</label>
      <input type="text" name="contactMail" class="form-control">
    </div>
    <div class="form-group">
      <label>メール送信用メールアドレス</label>
      <input type="text" name="sendMail" class="form-control">
    </div>
    <div class="form-group">
      <label>ホームページ</label>
      <input type="text" name="webPage" class="form-control">
    </div>
    <div class="form-group">
      <label>案件情報</label>
      <textarea name="caseInfo" class="form-control" rows=5></textarea>
    </div>
    <button type="submit">登録</button>
  </form>

</div>

<?php include('footer.html'); ?>
