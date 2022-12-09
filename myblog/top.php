<?php
  session_start();
  if (isset($_SESSION["user"])) { 
      print "ようこそ". $_SESSION['user'] ."さん";
      print "<a href='logout.php'>[ログアウト]</a>";
  } else { print "<a href='login_form.php'>[ログイン]</a>"; }
function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
$pdo = new PDO("sqlite:myblog.sqlite");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$st = $pdo->query("SELECT * FROM article ORDER BY id DESC;");
$data = $st->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>My Blog</title>
<link rel="stylesheet" href="myblog_style.css">
</head>
<body>
<h1>My Blog</h1>
<?php
foreach($data as $article) {
print '<div class="article">'; 
print '<h2>' . h($article["title"]) . '</h2>';
print '<p>' . h($article["body"]) . '</p>';
$st = $pdo->query("SELECT * FROM comment WHERE article_id=". $article['id'] ." ORDER BY id DESC;");
$data2 = $st->fetchAll();
foreach($data2 as $comment) {
print '<div class="comment">';
print '<h3>' . h($comment["name"]) . '</h3>';
print '<p>' . h($comment["body"]) . '</p>';
print '</div>';
}
print '<div class="comment_link">';
print '投稿日:' . h($article["time"]).  ' |';
print '<a href="comment_form.php?article_id=' . h($article["id"] ) . '">コメントする</a>';
print '</div>'; 
print '</div>'; 
}
?>
<div class=article_link>
<p><a href="article_form.php">記事を投稿する</a></p></div>
</body>
</html>