<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>新規作成</title>
</head>
<body>

<?php
$template = "template.php";
require "database.php";

if ($_POST{"title"}){

   $title = $_POST{"title"};
   $tag = $_POST{"tag"};
   $article = $_POST{"article"};
   $id = rand(1000000, 9999999);
   $filename = $id . ".php";
   $datetime = date('Y-m-d H:i:s');

   // 特殊文字を HTML エンティティに変換する
   $article = htmlspecialchars($article);

   createNewPage( $template, $id, $filename, $title);

   // データベースへ追加
   insertNewFile($id, $title, $tag, $article, $datetime);

} else {
   echo "タイトルを記入してください。";
}

function createNewPage( $template, $id, $filename, $title){
   //　テンプレートファイルの読み込み
   $contents = file_get_contents($template);

   // ファイル自体にIDを書き込む
   $contents = str_replace( "<%ID>", $id, $contents);

   //　ファイル作成＆書き込み
   $handle = fopen( $filename, 'w');
   fwrite( $handle, $contents);
   fclose( $handle);

   echo "タイトル：" . $title . "を作成しました。";

}
?>

<br><a href = "index.php">メニューに戻る</a>
</body>
</html>
