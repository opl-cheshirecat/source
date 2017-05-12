<!DOCTYPE html>
<html lang="ja">
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/cheshirecat/css/style.css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
  /* 入力値取得 */
  $id = $_REQUEST['id'];
  $password = $_REQUEST['password'];

  /* データベース接続 */
  $mysqli = new mysqli("localhost", "root", "root", "cheshirecat_test");
  $mysqli->set_charset("utf8");
  /* SQL */
  $sql = 'SELECT COUNT(*) FROM account WHERE StaffId = ? AND Password = ?';

  /* プリペアドステートメント */
  if ($stmt = $mysqli->prepare($sql)) {
    /* 変数のバインド */
    $stmt->bind_param('ss', $id, $password);

    /* プリペアドステートメント実行 */
    if ($stmt->execute()) {
      /* 結果の取得 */
      $result = $stmt->get_result();
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $cnt = $row['COUNT(*)'];

      if ($cnt == '1') {
        /* ログイン認証OKの場合(メニュー画面へ) */
        print('<!-- ヘッダ -->');
        print('<div class="header">');
        print('<div class="header_system_name">');
        print('顧客管理システム');
        print('</div>');
        print('');
        print('<div class="header_menu">');
        print('<table class="header_menu">');
        print('<tr>');
        print('<td class="header_menu">');
        print('<p class="header_menu_column">顧客情報登録</p>');
        print('</td>');
        print('<td class="header_menu">');
        print('<a href="searchInput.html">');
        print('<p class="header_menu_column">顧客情報検索</p>');
        print('</a>');
        print('</td>');
        print('</tr>');
        print('</table>');
        print('</div>');
        print('</div>');
        print('<!-- ヘッダ -->');
        print('');
        print('<!-- メニュー部 -->');
        print('<div class="main_flame">');
        print('<h2 class="main_flame_title">メニュー画面</h2>');
        print('<table class="id_input_form">');
        print('<tr>');
        print('<td>');
        print('<a href="/cheshirecat/registInput.html">顧客情報登録</a>');
        print('<td>');
        print('</tr>');
        print('<tr>');
        print('<td>');
        print('<a href="/cheshirecat/searchInput.html">顧客情報検索</a>');
        print('<td>');
        print('</tr>');
        print('<tr>');
        print('<td>');
        print('<a href="/cheshirecat/mailInput.html">メール作成</a>');
        print('<td>');
        print('</tr>');
        print('</table>');
        print('</div>');
        print('<!-- メニュー部 -->');

      } else {
        /* ログイン認証NGの場合(ログイン画面を表示) */
        print('<!-- ヘッダ -->');
        print('<div class="header">');
        print('<div class="header_system_name">');
        print('顧客管理システム');
        print('</div>');
        print('</div>');
        print('<form action="php/login.php" method="post">');
        print('<!-- 入力部 -->');
        print('<div class="main_flame">');
        print('<h2 class="main_flame_title">ログイン</h2>');
        print('');
        print('<table class="id_input_form">');
        print('<tr>');
        print('<td class="inputItem">');
        print('ID');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="text" name="id" value="' . $id .'">');
        print('</td>');
        print('</tr>');
        print('<tr>');
        print('<td class="inputItem">');
        print('パスワード');
        print('</td>');
        print('<td class="inputForm">');
        print('<input type="password" name="password" value="' . $password . '>');
        print('</td>');
        print('</tr>');
        print('</table>');
        print('</div>');
        print('<!-- 入力部 -->');
        print('<!-- ボタン部 -->');
        print('<table class="button_area" width="80%">');
        print('<tr>');
        print('<td align="center">');
        print('</button>');
        print('</td>');
        print('<td align="center">');
        print('</button>');
        print('</td>');
        print('</tr>');
        print('</table>');
        print('<!-- ボタン部 -->');
        print('</form>');
      }
    }
  }

?>
</body>
</html>
