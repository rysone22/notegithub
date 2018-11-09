<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>ブログ作成</title>
</head>
<body>
<a href = "index.php">メニューに戻る</a><br>

<?php
require "database.php";

if ($_POST{"delete"}){
   $id = $_POST{"delete"};

   deleteFile($id);

   unlink($id . '.php');
   exit("削除しました");
}

if ($_POST{"title"}){

   $id = $_POST{"id"};
   $title = $_POST{"title"};
   $tag = $_POST{"tag"};
   $article = $_POST{"article"};

   // 特殊文字をHTMLエンティティに変換する
   $article = htmlspecialchars($article);

   // データベースを更新
   updateFile($id, $title, $tag, $article);

   echo $title . "を更新しました";

} else {
   echo "タイトルを記入してください。";
}
?>

</body>
</html>
