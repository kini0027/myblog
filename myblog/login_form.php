<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Login form</title>
    <link rel="stylesheet" href="myblog_style.css">
  </head>
  <body>
<div class="article">
<h2>ユーザー名とパスワードを入力してください</h2>

<form action="login_submit.php" method="get">

<p>ユーザー名：<input type="text" name="username"><br></p>
<p>パスワード：<input type="password" name="passwd"><br></p>
<input type="submit" value="送信">
    </form>
    </div>
  </body>
</html>