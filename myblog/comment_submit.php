<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>My Blog - コメント登録</title>
    <link rel="stylesheet" href="myblog_style.css">          
  </head>
  <body>
  <div class="article">
    <h2>
<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }

  if (isset($_GET["article_id"]) && isset($_GET["name"]) && isset($_GET["body"])) {
    $article_id = $_GET["article_id"];
    $name = $_GET["name"];
    $body = $_GET["body"];
    $pdo = new PDO("sqlite:myblog.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("INSERT INTO comment(article_id,name, body) VALUES(?,?, ?)");
    $st->execute(array($article_id,$name, $body));
    echo  $result = "登録しました。";
  }
  else {
   echo $result = "記事の内容がありません。";
  }
?>
</h2>

    
 <p><a href="top.php">戻る</a></p> </div>
  </body>
    
</html>
