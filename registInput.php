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

  <form action="php/regist.php" method="post" name="crientForm" data-toggle="validator">
    <div class="form-group">
      <label>企業名</label>
      <input type="text" name="companyName" class="form-control" required>
    </div>
    <div class="form-group">
      <label>企業ランク</label>
      <select name="companyRank" id="companyRank" class="form-control" required>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
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
      <input type="text" id="contactTel" name="contactTel" class="form-control" style="ime-mode: disabled;" pattern="(^0[1-9]{1}-[0-9]{4}-[0-9]{4}$)|(^0[1-9]{2}-[0-9]{3,4}-[0-9]{4}$)|(^0[1-9]{3}-[0-9]{2}-[0-9]{4}$)">
    </div>
    <div class="form-group">
      <label>担当者メールアドレス</label>
      <input type="email" id="contactMail" name="contactMail" class="form-control" style="ime-mode: disabled;">
    </div>
    <div class="form-group">
      <label>メール送信用メールアドレス</label>
      <input type="email" id="sendMail" name="sendMail" class="form-control" style="ime-mode: disabled;">
    </div>
    <div class="form-group">
      <label>ホームページ</label>
      <input type="text" id="webPage" name="webPage" class="form-control" style="ime-mode: disabled;" pattern="^(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$">
    </div>
    <div class="form-group">
      <label>案件情報</label>
      <textarea name="caseInfo" class="form-control" rows=5></textarea>
    </div>
    <button type="submit">登録</button>
  </form>

</div>

<?php include('footer.html'); ?>
