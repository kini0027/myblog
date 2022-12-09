<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>My Blog - 記事登録</title>
    <link rel="stylesheet" href="myblog_style.css">          
  </head>
  <body>
      
  <div class="article">
    <h2>
<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
  session_start();

  date_default_timezone_set("Asia/Tokyo");
  if (isset($_GET["title"]) && isset($_GET["body"])) {
    $title = $_GET["title"];
    $body = $_GET["body"];
    $time = date("Y-m-d H:i");
    $pdo = new PDO("sqlite:myblog.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("INSERT INTO article(title, body, time) VALUES(?, ?, ?)");
    $st->execute(array($title, $body, $time));
     echo $result = "登録しました。";
  } else {
   echo $result = "記事の内容がありません。";
  }
?>
</h2>
 
 <p><a href="top.php">戻る</a></p> </div>
  </body>

</html>
