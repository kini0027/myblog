<?php

  session_start();
if (isset($_GET["username"]) && isset($_GET["passwd"])) {
   $username = $_GET["username"];
    $passwd = $_GET["passwd"];
    $pdo = new PDO("sqlite:myblog.sqlite"); 
    $st = $pdo->prepare("Select * from user where username=? or password=?;"); 
$st->execute(array($username,$passwd));
 $user_on_db = $st->fetch();

if ($username=!$user_on_db["username"]) { 
  $result = "指定されたユーザが存在しません。";
 } else if ($passwd==$user_on_db["password"]){
 $_SESSION["user"] = $username; 
$result = "ようこそ" . $username . "さん。ログイン成功しました。";
} else {
   $result = "パスワードが違います。"; }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login success</title>
    <link rel="stylesheet" href="myblog_style.css">
  </head>
  <body>
    <div class="article">
      <h2><?php
       echo $result; 
       ?></h2>
      <p><a href="top.php">戻る</a></p>
    </div>
  </body>
</html>
