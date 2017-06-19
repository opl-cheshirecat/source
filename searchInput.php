<?php include('header.html'); ?>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand text-muted">顧客管理システム</a>
    <ul class="nav navbar-nav navbar-right" id="nav">
      <li><a href="index.php">顧客情報登録</a></li>
      <li class="active"><a href="searchInput.php">顧客情報検索</a></li>
      <li><a href="php/mailSend.php">メール送信</a></li>
    </ul>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-5"><h2>顧客情報検索</h2></div>
  </div>

  <form action="php/search.php" method="post">
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
      <label>案件情報</label>
      <input type="text" name="caseInfo" class="form-control">
    </div>
    <button type="submit">検索</button>
  </form>

</div>

<?php include('footer.html'); ?>
