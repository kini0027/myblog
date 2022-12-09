<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>My Blog - コメント投稿</title>
    <link rel="stylesheet" href="myblog_style.css">          
  </head>
  <body>
  <form action="comment_submit.php" method="get">
  <div class="article">
  <h2>コメントを入力してください</h2>
  <p>名前</p>
  <p><input type="text" size="60"  name="name"></p>
  <p>コメント</p>
  <p><textarea name="body" cols="60" rows="12"></textarea><br>
  
        <input type="submit" value="送信"></p>
        <input type="hidden" name="article_id" value="<?php print h($_GET["article_id"]);?>">
  </div>
  </body>
</html>
