<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
  session_start();
  if (isset($_SESSION["user"])) { 
      print "ようこそ". $_SESSION['user'] ."さん";
      print "<a href='logout.php'>[ログアウト]</a>";
  } else { header("Location: login_form.php"); exit; }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>My Blog - 記事投稿</title>
    <link rel="stylesheet" href="myblog_style.css">          
  </head>
  <body>
  <form action="article_submit.php" method="get">
  <div class="article">
  <h2>記事を入力してください</h2>
  <p>タイトル</p>
  <p><input type="text" size="60"  name="title"></p>
  <p>本文</p>
  <p><textarea name="body" cols="60" rows="12"></textarea><br>
        <input type="submit" value="送信"></p>
  </div>
  </body>
</html>
